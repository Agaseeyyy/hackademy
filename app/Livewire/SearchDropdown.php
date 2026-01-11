<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Services\YouTubeService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr; // Ensure Arr is imported

class SearchDropdown extends Component
{
    public $search = '';
    public $blogs = [];
    public $courses = [];
    public $isLoading = false;
    public $showDropdown = false;
    public $activeTab = 'all';
    public $homeSearch = false;
    protected $youtubeService;

    public function boot(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function mount($homeSearch = false)
    {
        $this->homeSearch = $homeSearch;
    }

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->reset(['blogs', 'courses', 'showDropdown', 'activeTab']);
            $this->isLoading = false;
            return;
        }

        $this->isLoading = true;
        $this->showDropdown = true;
        $this->activeTab = 'all';

        // Search blogs
        $this->blogs = Blog::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('content', 'like', '%' . $this->search . '%')
            ->limit(4)
            ->get();

        // Search courses (YouTube videos)
        $this->courses = [];
        $allVideos = [];

        if ($this->youtubeService) {
            try {
                // 1. Fetch hardcoded videos (Temporarily Disabled)
                // $hardcodedVideosResponse = $this->youtubeService->getVideosByIds($this->getCyberSecurityVideoIds());
                // $this->processVideoCollection($hardcodedVideosResponse, $allVideos);

                // 2. Fetch playlist videos
                $playlistId = env('YOUTUBE_PLAYLIST_ID');
                if ($playlistId) {
                    $playlistVideosResponse = $this->youtubeService->getPlaylistVideos($playlistId);
                    // Get IDs of videos already added (will be empty if hardcoded is disabled)
                    $existingIds = array_column($allVideos, 'id');
                    $this->processVideoCollection($playlistVideosResponse, $allVideos, $existingIds);
                }

                // 3. Filter combined videos by search term
                if (!empty($this->search)) {
                    $searchTermLower = strtolower($this->search);

                    $filteredVideos = array_filter($allVideos, function ($video) use ($searchTermLower) {
                        // Safely get title and description, default to empty string if null
                        $title = strtolower($video['title'] ?? '');
                        $description = strtolower($video['description'] ?? '');

                        // Perform case-insensitive search only if the field is not empty
                        $titleMatch = $title !== '' && str_contains($title, $searchTermLower);
                        $descriptionMatch = $description !== '' && str_contains($description, $searchTermLower);

                        return $titleMatch || $descriptionMatch;
                    });
                    $this->courses = array_slice(array_values($filteredVideos), 0, 4);
                } else {
                    $this->courses = array_slice($allVideos, 0, 4);
                }

            } catch (\Exception $e) {
                Log::error('YouTube search error in SearchDropdown: ' . $e->getMessage(), ['exception' => $e]);
            }
        } else {
             Log::error('YouTubeService not available in SearchDropdown.');
        }

        $this->isLoading = false;
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    private function getCyberSecurityVideoIds()
    {
        // Temporarily return empty array to disable hardcoded IDs
        return [];
        /*
        return [
            'L5lLH3d9xjU',
            'bPVaOlJ6ln0',
            'T1fyvjxdF2g',
            'jKL5Xr4KPVI',
            'vrh0epPAC5w',
            'dz7Ntp7KQGA',
            'M1BokMOhzf0',
            'qSnPayW6F7U',
            'sdpjBTkMzxI',
            'Zl1TlFpnjRo',
            'th1bAXQkNyQ',
            'gf5uW2PpX6o',
            'qFX18Sjsokk',
            'rcDO8Gvr8io',
        ];
        */
    }

    private function processVideoData($video) // Use Arr::get for robustness
    {
        // Use Arr::get for nested data, providing default empty arrays/null/empty strings
        $snippet = Arr::get($video, 'snippet', []);
        $statistics = Arr::get($video, 'statistics', []);
        $thumbnails = Arr::get($snippet, 'thumbnails', []);
        $highThumbnail = Arr::get($thumbnails, 'high');
        $defaultThumbnail = Arr::get($thumbnails, 'default');

        return [
            'id' => $video['id'] ?? null, // ID is set in processVideoCollection
            'title' => Arr::get($snippet, 'title', 'Untitled Video'),
            'description' => Arr::get($snippet, 'description', ''), // Default to empty string
            'thumbnail' => Arr::get($highThumbnail, 'url', Arr::get($defaultThumbnail, 'url', '')), // Fallback thumbnail
            'views' => number_format(intval(Arr::get($statistics, 'viewCount', 0))), // Default views to 0
            'publishedAt' => Arr::get($snippet, 'publishedAt') ? date('M d, Y', strtotime(Arr::get($snippet, 'publishedAt'))) : 'N/A', // Default date
        ];
    }

    private function processVideoCollection($response, &$allVideos, $skipIds = [])
    {
        foreach ($response['items'] ?? [] as $item) {
            // Determine the correct video ID using Arr::get, checking contentDetails first
            $videoId = Arr::get($item, 'contentDetails.videoId', Arr::get($item, 'id'));

            if (!$videoId) {
                continue;
            }

            // Check for duplicates using the determined videoId
            if (in_array($videoId, $skipIds) || in_array($videoId, array_column($allVideos, 'id'))) {
                continue;
            }

            // Prepare the data structure for processVideoData.
            $dataToProcess = $item;
            $dataToProcess['id'] = $videoId; // Ensure top-level 'id' is the actual video ID

            $videoData = $this->processVideoData($dataToProcess);

            if (!empty($videoData['id'])) {
                 $allVideos[] = $videoData;
            }
        }
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}