<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\YouTubeService;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class CourseSearch extends Component
{
    use WithPagination;
    
    public $search = '';
    public $allVideos = [];
    protected $youtubeService;

    protected $listeners = ['refreshVideos' => 'getVideos'];

    public function boot(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function mount()
    {
        $this->getVideos();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getVideos()
    {
        // Get all videos
        $videos = [];
        
        $hardcodedVideos = $this->youtubeService->getVideosByIds($this->getCyberSecurityVideoIds());
        $this->processVideoCollection($hardcodedVideos, $videos);
        
        $playlistId = env('YOUTUBE_PLAYLIST_ID');
        if ($playlistId) {
            $playlistVideos = $this->youtubeService->getPlaylistVideos($playlistId);
            
            $existingIds = array_column($videos, 'id');
            $this->processVideoCollection($playlistVideos, $videos, $existingIds);
        }
        
        $this->allVideos = $videos;
    }

    public function render()
    {
        // Filter videos based on search
        $searchTerm = strtolower($this->search);
        $filteredVideos = collect($this->allVideos)->filter(function($video) use ($searchTerm) {
            if (empty($searchTerm)) return true;
            return str_contains(strtolower($video['title']), $searchTerm) || 
                  str_contains(strtolower($video['description']), $searchTerm);
        });

        // Create paginator
        $perPage = 16;
        $currentPage = $this->page;
        
        $paginatedData = $filteredVideos->forPage($currentPage, $perPage);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedData,
            $filteredVideos->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        $featuredVideos = collect($this->allVideos)->take(3)->toArray();

        return view('livewire.course-search', [
            'videos' => $paginator->items(),
            'paginator' => $paginator,
            'featuredVideos' => $featuredVideos,
            'hasSearchResults' => !empty($this->search),
        ]);
    }
    
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
   
    private function getCyberSecurityVideoIds()
    {
        return [
            // Security Basics
            'L5lLH3d9xjU', // "What is Cybersecurity?"
            'bPVaOlJ6ln0', // "Day in the Life of a Cybersecurity Analyst"
            'T1fyvjxdF2g', // "What is Cyber Security?"
            
            // Network Security
            'jKL5Xr4KPVI', // "What is Network Security?"
            'vrh0epPAC5w', // "Network Security Explained"
            'dz7Ntp7KQGA', // "Firewalls Explained"
            
            // Ethical Hacking
            'M1BokMOhzf0', // "Ethical Hacking Full Course"
            'qSnPayW6F7U', // "Introduction to Penetration Testing"
            
            // Tools & Techniques
            'sdpjBTkMzxI', // "Wireshark Tutorial for Beginners"
            'Zl1TlFpnjRo', // "Introduction to OSINT"
            
            // Threats & Attacks
            'th1bAXQkNyQ', // "Types of Cyber Attacks"
            'gf5uW2PpX6o', // "Phishing Attacks Explained"
            
            // Cryptography & Security
            'qFX18Sjsokk', // "Cryptography Basics Explained"
            'rcDO8Gvr8io', // "Cybersecurity Expert Explains Privacy"
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
            $allVideos[] = $this->processVideoData($item);
        }
    }
}
