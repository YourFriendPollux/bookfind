//This file belongs to the BookFind project.
//
//BookFind is distributed under the terms of the GNU Affero General Public License v3.0.
//
//Copyright (C) 2025 Chromared


let pageTitle = document.title;
let pageTitleTimeout;

const startPageTitleFlashing = () => {
    pageTitleTimeout = setInterval(function () {
        document.title = document.title === pageTitle ? "BookFind" : pageTitle;
    }, 1500);
};

window.addEventListener("load",
startPageTitleFlashing);