function updateUrl(nextURL) {
    const nextTitle = "My new page title";
    const nextState = {
    additionalInformation: "Updated the URL with JS",
    };

    // This will create a new entry in the browser's history, without reloading
    window.history.pushState(nextState, nextTitle, nextURL);
}