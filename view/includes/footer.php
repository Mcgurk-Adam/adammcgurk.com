
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

<div id="announcement">
    <span class="icon"></span>
    <span class="message"></span>
</div>

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
    function showToast(message, type = "success") {
        const toast = document.getElementById("announcement");
        toast.classList.add("show", type);
        toast.querySelector(".message").innerText = message;
        setTimeout(removeToast, 3000);
        toast.addEventListener("click", removeToast);
        function removeToast() {
            toast.classList.remove("show", "success", "error", "warning");
            toast.removeEventListener("click", removeToast);
        }
    }
</script>

<script src="/js/build.js"></script>

</body>
</html>
