<?php

namespace App\Http\Controllers;

use App\Services\YouTubeService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function index(Request $request)
    {
        // Clear cache for testing purposes (remove in production)
        // Cache::flush(); // Consider removing or commenting out for production

        $search = $request->input('search'); // Get search term

        $allVideos = [];
        
        // Fetch playlist videos
        $playlistId = env('YOUTUBE_PLAYLIST_ID');
        if ($playlistId) {
            $playlistVideos = $this->youtubeService->getPlaylistVideos($playlistId);
            // Process the playlist videos (existing logic)
            $existingIds = array_column($allVideos, 'id');
            $this->processVideoCollection($playlistVideos, $allVideos, $existingIds);
        }

        // Filter videos if search term exists
        if ($search) {
            $searchTermLower = strtolower($search);
            $allVideos = array_filter($allVideos, function ($video) use ($searchTermLower) {
                return str_contains(strtolower($video['title']), $searchTermLower) ||
                       str_contains(strtolower($video['description']), $searchTermLower);
            });
            // Re-index array after filtering
            $allVideos = array_values($allVideos); 
        }
        
        // Create paginator from the potentially filtered array
        $perPage = 12;
        $page = $request->get('page', 1);
        $paginator = new LengthAwarePaginator(
            array_slice($allVideos, ($page - 1) * $perPage, $perPage),
            count($allVideos),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()] // Use request() helper or $request variable
        );
        
        return view('visitors.course', [
            'allVideos' => $paginator->items(),  // Send the current page items
            'paginator' => $paginator,           // Send the paginator for links
            'searchTerm' => $search              // Pass search term to the view
        ]);
    }
    
    public function show($id)
    {
        // Fetch the playlist videos from .env to get the full context
        $playlistId = env('YOUTUBE_PLAYLIST_ID');
        
        if (!$playlistId) {
            return redirect()->route('courses')->with('error', 'Playlist ID not configured.');
        }

        // Get all videos to populate related/popular
        $allVideosResponse = $this->youtubeService->getPlaylistVideos($playlistId);
        $allVideos = [];
        
        // Process collection to get video IDs for comparison
        foreach ($allVideosResponse['items'] ?? [] as $item) {
            // We process directly here to avoid extra function calls or to match existing flow
            $allVideos[] = $this->processVideoData($item);
        }
        
        // Find the specific video in the playlist array
        $currentVideo = null;
        $currentKey = null;
        
        foreach ($allVideos as $key => $video) {
            if ($video['id'] === $id) {
                $currentVideo = $video;
                $currentKey = $key;
                break;
            }
        }

        // If video not found in the playlist, redirect back
        if ($currentVideo === null) {
            return redirect()->route('courses');
        }
        
        $processedVideo = $currentVideo;
        $processedVideo['description'] = nl2br($processedVideo['description']);
        
        // Remove current video from the list for related/popular lists
        unset($allVideos[$currentKey]);
        $allVideos = array_values($allVideos);
        
        // Get related videos
        $relatedVideos = array_slice($allVideos, 0, 5);
        
        // Sort by views for popular videos
        usort($allVideos, function($a, $b) {
            return intval(str_replace(',', '', $b['views'])) - intval(str_replace(',', '', $a['views']));
        });
        
        $popularVideos = array_slice($allVideos, 0, 3);
        
        return view('visitors.course-detail', [
            'video' => $processedVideo,
            'relatedVideos' => $relatedVideos,
            'allVideos' => $allVideos,
            'popularVideos' => $popularVideos
        ]);
    }

    // --- Helper Methods ---

    private function processVideoData($video)
    {
        return [
            'id' => $video['id'],
            'title' => $video['snippet']['title'],
            'description' => $video['snippet']['description'],
            'thumbnail' => $video['snippet']['thumbnails']['high']['url'] ?? 
                     ($video['snippet']['thumbnails']['default']['url'] ?? ''),
            'views' => number_format($video['statistics']['viewCount'] ?? 0),
            'publishedAt' => date('M d, Y', strtotime($video['snippet']['publishedAt'] ?? 'now')),
        ];
    }
    
    private function processVideoCollection($response, &$allVideos, $skipIds = [])
    {
        foreach ($response['items'] ?? [] as $item) {
            // Skip if already in our collection
            if (in_array($item['id'], $skipIds)) {
                continue;
            }
            
            // Process each video into a consistent format
            $video = [
                'id' => $item['id'],
                'title' => $item['snippet']['title'] ?? 'Untitled Video',
                'description' => $item['snippet']['description'] ?? '',
                'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? 
                             ($item['snippet']['thumbnails']['default']['url'] ?? ''),
                'views' => number_format(intval($item['statistics']['viewCount'] ?? 0)), 
                'publishedAt' => date('M d, Y', strtotime($item['snippet']['publishedAt'] ?? 'now')),
            ];
            
            $allVideos[] = $video;
        }
    }
}