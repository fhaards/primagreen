function data() {
	function getThemeFromLocalStorage() {
		// if user already changed the theme, use it
		if (window.localStorage.getItem("dark")) {
			return JSON.parse(window.localStorage.getItem("dark"));
		}

		// else return their preferences
		return (
			!!window.matchMedia &&
			window.matchMedia("(prefers-color-scheme: dark)").matches
		);
	}

	function setThemeToLocalStorage(value) {
		window.localStorage.setItem("dark", value);
	}

	return {
		dark: getThemeFromLocalStorage(),
		toggleTheme() {
			this.dark = !this.dark;
			setThemeToLocalStorage(this.dark);
		},
		isSideMenuOpen: false,
		toggleSideMenu() {
			this.isSideMenuOpen = !this.isSideMenuOpen;
		},
		closeSideMenu() {
			this.isSideMenuOpen = false;
		},
		isNotificationsMenuOpen: false,
		toggleNotificationsMenu() {
			this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
		},
		closeNotificationsMenu() {
			this.isNotificationsMenuOpen = false;
		},
		isCartMenuOpen: false,
		toggleCartMenu() {
			this.isCartMenuOpen = !this.isCartMenuOpen;
		},
		closeCartMenu() {
			this.isCartMenuOpen = false;
		},
		isProfileMenuOpen: false,
		toggleProfileMenu() {
			this.isProfileMenuOpen = !this.isProfileMenuOpen;
		},
		closeProfileMenu() {
			this.isProfileMenuOpen = false;
		},
		isPagesMenuOpen: false,
		togglePagesMenu() {
			this.isPagesMenuOpen = !this.isPagesMenuOpen;
		},
		isSettingMenuOpen: false,
		toggleSettingsMenu() {
			this.isSettingMenuOpen = !this.isSettingMenuOpen;
		},
		// Modal
		isModalOpen: false,
		trapCleanup: null,
		openModal() {
			this.isModalOpen = true;
			this.trapCleanup = focusTrap(document.querySelector("#modal"));
		},
		closeModal() {
			this.isModalOpen = false;
			this.trapCleanup();
		},
	};
}

function changeAtiveTab(event, tabID) {
	let element = event.target;
	while (element.nodeName !== "A") {
		element = element.parentNode;
	}
	ulElement = element.parentNode.parentNode;
	aElements = ulElement.querySelectorAll("li > a");
	tabContents = document
		.getElementById("tabs-id")
		.querySelectorAll(".tab-content > div");
	for (let i = 0; i < aElements.length; i++) {
		aElements[i].classList.remove("text-white");
		aElements[i].classList.remove("bg-green-600");
		aElements[i].classList.add("text-green-600");
		aElements[i].classList.add("bg-white");
		tabContents[i].classList.add("hidden");
		tabContents[i].classList.remove("block");
	}
	element.classList.remove("text-green-600");
	element.classList.remove("bg-white");
	element.classList.add("text-white");
	element.classList.add("bg-green-600");
	document.getElementById(tabID).classList.remove("hidden");
	document.getElementById(tabID).classList.add("block");
}
