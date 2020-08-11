var Tabs = (function () {
    function Tabs(tabContainerSelector, tabClickedFunction) {
        this.tabContainer = document.querySelector(tabContainerSelector);
        this.tabs = this.tabContainer.querySelectorAll("button.tab");
        this.tabClickedFunction = tabClickedFunction;
    }
    Tabs.prototype.addListeners = function () {
        var _this = this;
        this.tabs.forEach(function (tab) {
            tab.addEventListener("click", function () {
                tab.classList.toggle("selected");
                _this.tabClickedFunction(_this.tabs);
            }, false);
        });
    };
    return Tabs;
}());
var projectTabs = new Tabs("#projects .tab-container", function (allTabs) {
    var projectTiles = document.querySelectorAll("#projects .tile");
    var selectedTags = [];
    allTabs.forEach(function (tab) {
        if (tab.classList.contains("selected")) {
            selectedTags.push(tab.getAttribute("name"));
        }
    });
    if (selectedTags.length == 0) {
        projectTiles.forEach(function (tile) { return tile.style.display = "flex"; });
    }
    else {
        projectTiles.forEach(function (tile) {
            var allTags = tile.getAttribute("data-tech-tags");
            selectedTags.forEach(function (tag) {
                tile.style.display = allTags.includes(tag) ? "flex" : "none";
            });
        });
    }
});
projectTabs.addListeners();
