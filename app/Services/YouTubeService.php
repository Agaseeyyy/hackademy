<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class YouTubeService
{
    protected $apiKey;
    protected $baseUrl = 'https://youtube.googleapis.com/youtube/v3';
    protected $cacheDuration = 30; // minutes

    public function __construct()
    {
        $this->apiKey = env('YOUTUBE_API_KEY');
    }

    public function getPlaylistVideos($playlistId = null, $maxResults = 50)
    {
        $playlistId = $playlistId ?? env('YOUTUBE_PLAYLIST_ID');
        $cacheKey = 'youtube_playlist_' . $playlistId;
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        
        $response = Http::get("{$this->baseUrl}/playlistItems", [
            'part' => 'snippet,contentDetails',
            'playlistId' => $playlistId,
            'maxResults' => $maxResults,
            'key' => $this->apiKey
        ]);
        
        if (!$response->successful()) {
            return ['items' => []];
        }
        
        $playlistData = $response->json();
        
        // Extract video IDs
        $videoIds = [];
        foreach ($playlistData['items'] ?? [] as $item) {
            if (isset($item['contentDetails']['videoId'])) {
                $videoIds[] = $item['contentDetails']['videoId'];
            }
        }
        
        if (empty($videoIds)) {
            return ['items' => []];
        }
        
        // Get full video details
        $videoData = $this->getVideosByIds($videoIds);
        
        Cache::put($cacheKey, $videoData, now()->addMinutes($this->cacheDuration));
        
        return $videoData;
    }

    public function getVideosByIds(array $videoIds)
    {
        if (empty($videoIds)) {
            return ['items' => []];
        }
        
        $cacheKey = 'youtube_videos_' . md5(implode(',', $videoIds));
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        
        $response = Http::get("{$this->baseUrl}/videos", [
            'part' => 'id,snippet,contentDetails,statistics',
            'id' => implode(',', $videoIds),
            'key' => $this->apiKey
        ]);
        
        if (!$response->successful()) {
            return ['items' => []];
        }
        
        $data = $response->json();
        
        // Add category to each video based on title
        if (isset($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $key => $item) {
                $data['items'][$key]['category'] = $this->generateCategoryFromTitle($item['snippet']['title']);
            }
        }
        
        Cache::put($cacheKey, $data, now()->addMinutes($this->cacheDuration));
        
        return $data;
    }

    public function generateCategoryFromTitle($title)
    {
        $lowerTitle = strtolower($title);
        
        // Simple mapping of keywords to categories
        $keywordMap = [
            // General Security
            'cyber security' => 'security-basics',
            'cybersecurity' => 'security-basics',
            'security basics' => 'security-basics',
            
            // Network
            'network' => 'network-security',
            'firewall' => 'network-security',
            'vpn' => 'network-security',
            
            // Hacking & Testing
            'hack' => 'pentesting',
            'penetration test' => 'pentesting',
            'pentest' => 'pentesting',
            'ethical' => 'pentesting',
            'kali' => 'pentesting',
            
            // Web Security
            'web' => 'web-security',
            'xss' => 'web-security',
            'sql injection' => 'web-security',
            
            // Malware
            'malware' => 'malware-analysis',
            'virus' => 'malware-analysis',
            'ransomware' => 'malware-analysis',
            
            // Cryptography
            'crypt' => 'cryptography',
            'encryption' => 'cryptography',
            
            // Other Categories
            'forensic' => 'forensics',
            'phishing' => 'social-engineering',
            'social engineering' => 'social-engineering',
            'cert' => 'certifications',
            'osint' => 'osint'
        ];
        
        foreach ($keywordMap as $keyword => $category) {
            if (strpos($lowerTitle, $keyword) !== false) {
                return $category;
            }
        }
        
        return 'general-security';
    }
}
