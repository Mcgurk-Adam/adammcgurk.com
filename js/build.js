var Tabs = (function () {
    function Tabs(tabContainerSelector) {
        this.tabContainer = document.querySelector(tabContainerSelector);
        this.tabs = this.tabContainer.querySelectorAll("button.tab");
    }
    Tabs.prototype.addListeners = function () {
        this.tabs.forEach(function (tab) {
            tab.addEventListener("click", function () {
                tab.classList.toggle("selected");
            }, false);
        });
    };
    return Tabs;
}());
var projectTabs = new Tabs("#projects .tab-container");
projectTabs.addListeners();
