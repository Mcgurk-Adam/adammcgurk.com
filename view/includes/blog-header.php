<article>
    <span id="topic-tag"><?=$topicTag?></span>
    <h1><?=$blogTitle?></h1>
    <p id="blog-subtitle"><?=$blogSubtitle?></p>
    <div id="blog-author-container">
        <img src="/assets/AdamHeadshot.jpg" alt="Adam McGurk's headshot" title="Adam McGurk">
        <div>
            <span id="author-name"></span>
            <time id="date-posted" datetime="<?=$isoDateBlogPosted?>"><?=$prettyDateBlogPosted?></time>
        </div>
    </div>
    <img src="<?=$blogHero?>" alt="<?=$blogHeroAlt?>" title="<?=$blogHeroTitle?>">