<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/video.css">
</head>

<body>
    <header class="header">
        <div class="left-section">
            <img class="hamburger" src="icons/hamburger-menu.svg" alt="">
            <img class="youtube-logo" src="images/logo.png" alt="">
        </div>
        <div class="middle-section">
            <input class="search-bar" type="text" placeholder="Search">
            <button class="search">
                <img class="search-icon" src="icons/search.svg" alt="search">      
            <div class="tooltip">Search</div>
            </button>

            <button class="voice-search">
                <img class="voice-icon" src="icons/voice-search-icon.svg" alt="search">      
                <div class="tooltip">Voice Search</div>
            </button>
        </div>

        <div class="right-section">
            <div class="upload-icon-container">
                <img class="upload-icon" src="icons/upload.svg" alt="">
                <div class="tooltip">Create</div>
            </div>
            <div class="youtube-apps-container"><img class="youtube-apps" src="icons/youtube-apps.svg" alt="">
                <div class="tooltip">Youtube Apps</div>
            </div>

            <div class="notification-icon-container">
                <img class="notification-icon" src="icons/notifications.svg" alt="">
                <div class="count">5</div>
                <div class="tooltip">Notifications</div>
            </div>

            <img class="channel-picture" src="icons/profile.jpg" alt="">
        </div>


    </header>

    <nav class="sidebar">
        <div class="sidebar-link">
          <a href="/dashboard"><img src="icons/home-1.svg" alt=""></a>
            <div>Home</div>
        </div>
        <div class="sidebar-link">
            <img src="icons/Recommend.png" alt="">
            <div>Recommended</div>
        </div>
        <div class="sidebar-link">
            <img src="icons/transaction.svg" alt="">
            <div>Transactions</div>
        </div>
        <div class="sidebar-link">
            <img src="icons/favorite.svg" alt="">
            <div>Favorites</div>
        </div>
        <div class="sidebar-link">
            <img src="icons/support.svg" alt="">
            <div>Support</div>
        </div>
        <div class="sidebar-link">
            <img src="icons/faq.svg" alt="">
            <div>FAQ</div>
        </div>
    </nav>
    <main>
        <section class="video-grid">
            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-1.webp">
                    <div class="video-time">
                        14:20
                    </div>
                </div>

                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-1.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">Talking Tech and AI with Google CEO Sundar Pichai!</p>
                        <p class="author">Marques Brownlee</p>
                        <p class="stats">3.4M views &#183; 6 months ago</p>
                    </div>
                </div>

            </div>
            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-2.webp">
                    <div class="video-time1">
                        8:22
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-2.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">Try Not To Laugh Challenge #9</p>
                        <p class="author">Markiplier</p>
                        <p class="stats">19M views &#183; 4 years ago</p>
                    </div>

                </div>

            </div>

            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-3.webp">
                    <div class="video-time2">
                        9:13
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-3.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">
                            Crazy Tik Toks Taken Moments Before DISASTER</p>
                        <p class="author">SSSniperWolf</p>
                        <p class="stats">12M views &#183; 1 year ago</p>
                    </div>
                </div>

            </div>
            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-4.webp">

                    <div class="video-time3">
                        22:09
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-4.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">The Simplest Math Problem No One Can Solve - Collatz Conjecture</p>
                        <p class="author">Veritasium</p>
                        <p class="stats">18M views &#183; 4 months ago</p>
                    </div>

                </div>

            </div>

            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-5.webp">

                    <div class="video-time4">
                        11:17
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-5.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">Kadane's Algorithm to Maximum Sum Subarray Problem</p>
                        <p class="author">CS Dojoe</p>
                        <p class="stats">519K views &#183; 5 years agoo</p>
                    </div>
                </div>

            </div>
            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-6.webp">

                    <div class="video-time5">
                        19:59
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-6.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">
                            Anything You Can Fit In The Circle Ill Pay For</p>
                        <p class="author">MrBeast</p>
                        <p class="stats">141M views &#183; 1 year ago</p>
                    </div>

                </div>

            </div>

            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-7.webp">

                    <div class="video-time6">
                        10:13
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-7.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">Why Planes Don't Fly Over Tibet</p>
                        <p class="author">RealLifeLore</p>
                        <p class="stats">6.6M views &#183; 1 year ago</p>
                    </div>
                </div>

            </div>
            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-8.webp">

                    <div class="video-time7">
                        7:12
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-8.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">Inside The World's Biggest Passenger Plane</p>
                        <p class="author">Tech Visionr</p>
                        <p class="stats">3.7M views &#183; 10 months ago</p>
                    </div>

                </div>

            </div>

            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-9.webp">
                    <div class="video-time8">
                        13:17
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-9.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">The SECRET to Super Human STRENGTH

                        </p>
                        <p class="author">ThenX</p>
                        <p class="stats">20M views &#183; 3 year ago</p>
                    </div>
                </div>

            </div>
            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-10.webp">

                    <div class="video-time9">
                        7:53
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-10.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">How The World's Largest Cruise Ship Makes 30,000 Meals Every Day</p>
                        <p class="author">Business Insider</p>
                        <p class="stats">14M views &#183; 1 year ago</p>
                    </div>

                </div>

            </div>

            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-11.webp">

                    <div class="video-time10">
                        4:10
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-11.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">Dubai's Crazy Underwater Train and Other Things #Only in Dubai</p>
                        <p class="author">Destination Tips</p>
                        <p class="stats">3M views &#183; 1 year ago</p>
                    </div>
                </div>

            </div>
            <div class="video-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="thumbnails/thumbnail-12.webp">

                    <div class="video-time11">
                        4:51
                    </div>
                </div>
                <div class="video-info-grid">
                    <div class="channel-picture">
                        <img class="profile-picture" src="channel-pictures/channel-12.jpeg" alt="">
                    </div>
                    <div class="video-info">
                        <p class="video-title">
                            What would happen if you didn’t drink water? - Mia Nacamulli</p>
                        <p class="author">TED-Ed</p>
                        <p class="stats">12M views &#183; 5 years ago</p>
                    </div>

                </div>

            </div>
        </section>
    </main>


</body>

</html>