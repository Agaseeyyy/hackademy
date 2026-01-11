<p align="center">
  <img src="public/img/favicon.png" alt="Hackademy Logo" width="300">
</p>

<h1 align="center">Hackademy</h1>

<p align="center">
  <strong>A modern cybersecurity learning platform powered by Laravel</strong>
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#tech-stack">Tech Stack</a> •
  <a href="#installation">Installation</a> •
  <a href="#configuration">Configuration</a> •
  <a href="#usage">Usage</a> •
  <a href="#screenshots">Screenshots</a> •
  <a href="#license">License</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire">
  <img src="https://img.shields.io/badge/TailwindCSS-4.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
</p>

---

## 📖 About

**Hackademy** is a comprehensive cybersecurity learning platform designed to help beginners and professionals master essential security skills. The platform aggregates curated video tutorials from YouTube playlists and presents them in a beautiful, organized interface with smart categorization, real-time search, and a responsive design.

Whether you're just starting your cybersecurity journey or looking to expand your expertise in areas like network security, ethical hacking, or cloud security, Hackademy provides a structured learning path with expert-led tutorials.

---

## ✨ Features

- 🎥 **YouTube Integration** - Automatically fetches and displays videos from configured YouTube playlists
- 📱 **Fully Responsive** - Beautiful UI that works seamlessly on desktop, tablet, and mobile
- 📝 **Blog System** - Built-in basic blog functionality
- 👤 **User Management** - Role-based authentication with admin panel
- 📊 **View Statistics** - Track popularity and engagement
- 🔐 **Secure Admin Panel** - Protected admin routes with middleware
- ⚡ **Caching** - Smart caching for YouTube API responses to improve performance
- 🎨 **Modern UI** - Clean, professional design with smooth animations

---

## 🛠️ Tech Stack

| Technology | Purpose |
|------------|---------|
| **Laravel 12** | Backend PHP framework |
| **Livewire 3** | Dynamic UI components without JavaScript |
| **Tailwind CSS** | Utility-first CSS styling |
| **MariaDB/MySQL** | Database |
| **YouTube Data API v3** | Video content integration |
| **Vite** | Frontend asset bundling |
| **Parsedown** | Markdown parsing for blog posts |

---

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- MariaDB/MySQL
- YouTube Data API Key

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/agaseeyyy/hackademy.git
cd hackademy
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install Node.js dependencies

```bash
npm install
```

### 4. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure your `.env` file

```env
# Database Configuration
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hackademy
DB_USERNAME=root
DB_PASSWORD=your_password

# YouTube API Configuration
YOUTUBE_API_KEY=your_youtube_api_key
YOUTUBE_PLAYLIST_ID=your_playlist_id
```

### 6. Run database migrations

```bash
php artisan migrate
```

### 7. (Optional) Seed the database

```bash
php artisan db:seed
```

---

## ⚙️ Configuration

### YouTube API Setup

1. Go to the [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Enable the **YouTube Data API v3**
4. Create an API key under **Credentials**
5. Add the API key to your `.env` file as `YOUTUBE_API_KEY`
6. Add your YouTube playlist ID as `YOUTUBE_PLAYLIST_ID`

### Video Categories

The platform automatically categorizes videos based on title keywords. Categories include:

| Category | Keywords |
|----------|----------|
| Security Basics | cyber security, cybersecurity, security basics |
| Network Security | network, firewall, vpn |
| Pentesting | hack, penetration test, pentest, ethical, kali |
| Web Security | web, xss, sql injection |
| Malware Analysis | malware, virus, ransomware |
| Cryptography | crypt, encryption |
| Forensics | forensic |
| Social Engineering | phishing, social engineering |
| OSINT | osint |

---

## 💻 Usage

### Development Server

Start all development services concurrently:

```bash
composer dev
```

This runs:
- Laravel development server (`php artisan serve`)
- Queue worker (`php artisan queue:listen`)
- Log viewer (`php artisan pail`)
- Vite dev server (`npm run dev`)

### Alternative: Run services individually

```bash
# Terminal 1 - Laravel server
php artisan serve

# Terminal 2 - Vite
npm run dev
```

### Access the application

- **Homepage**: http://localhost:8000
- **Tutorials**: http://localhost:8000/tutorials
- **Blogs**: http://localhost:8000/blogs
- **Admin Login**: http://localhost:8000/manage/login

---

## 📁 Project Structure

```
hackademy/
├── app/
│   ├── Http/Controllers/     # Request handlers
│   ├── Livewire/             # Livewire components
│   ├── Models/               # Eloquent models
│   └── Services/             # Business logic (YouTubeService)
├── resources/
│   └── views/
│       ├── admin/            # Admin panel views
│       ├── components/       # Blade components
│       ├── livewire/         # Livewire component views
│       └── visitors/         # Public-facing pages
├── routes/
│   └── web.php               # Web routes
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
└── public/
    └── img/                  # Static images
```

---

## 🧪 Testing

Run the test suite:

```bash
composer test
```

Or run Pest directly:

```bash
php artisan test
```

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework for web artisans
- [Livewire](https://livewire.laravel.com) - Full-stack framework for Laravel
- [Tailwind CSS](https://tailwindcss.com) - A utility-first CSS framework
- [YouTube Data API](https://developers.google.com/youtube/v3) - For video content integration
