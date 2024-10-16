
<footer>

	<p>&copy; Adam McGurk <?=\date('Y');?></p>

	<div class="footer-links">

		<a href="https://twitter.com/adammmcgurk" title="Go to Adam's Twitter" class="icon" target="_blank" rel="noopener">
			<img src="/assets/twitter.svg" alt="Twitter" title="Twitter" style="height: 27px;">
		</a>

		<a href="https://github.com/Mcgurk-Adam" title="Go to Adam's GitHub" class="icon" target="_blank" rel="noopener">
			<img src="/assets/github.svg" alt="Github" title="Github">
		</a>

		<a href="https://dev.to/mcgurkadam" title="Go to this repo" class="icon" target="_blank" rel="noopener">
			<img src="/assets/devto.svg" alt="Github" title="DevTo">
		</a>

	</div>

</footer>

<script>
    function trackEvent(eventName) {
        if (fathom) {
            fathom.trackEvent(eventName);
        } else {
            console.log(`Would have logged an event to Fathom called ${eventName}`);
        }
    }
    const eventsToPotentiallyTrack = ["click", "touchstart", "input", "blur", "drop", "focus"];
    eventsToPotentiallyTrack.forEach((eventName) => {
        const eventsToTrack = document.querySelectorAll(`[data-track-${eventName}]`);
        eventsToTrack.forEach((element) => {
            element.addEventListener(eventName, () => {
                trackEvent(element.getAttribute(`data-track-${eventName}`));
            });
        });
    });
</script>

<script src="/js/build.js"></script>

</body>
</html>
