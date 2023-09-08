window.addEventListener("alert", (event) => {
    const flashContainer = document.getElementById("flash-container");
    const type = event.detail.type ?? "info";
    const message = event.detail.message ?? "This is a message.";
    const position = {
        center: "  self-center",
        start: "  self-start",
        end: "  self-end",
    }[event.detail.position ?? "center"];

    let divColors;
    let buttonColors;
    let iconClass;

    switch (type) {
        case "success":
            divColors = "text-green-800 border-green-300 bg-green-50";
            buttonColors = "bg-green-50 text-green-500 hover:text-green-800";
            iconClass = "fa-solid fa-circle-check";
            break;

        case "warning":
            divColors = "text-yellow-800 border-yellow-300 bg-yellow-50";
            buttonColors = "bg-yellow-50 text-yellow-500 hover:text-yellow-800";
            iconClass = "fa-solid fa-triangle-exclamation";
            break;

        case "error":
            divColors = "text-red-800 border-red-300 bg-red-50";
            buttonColors = "bg-red-50 text-red-500 hover:text-red-800";
            iconClass = "fa-solid fa-circle-xmark";
            break;

        default:
            divColors = "text-blue-800 border-blue-300 bg-blue-50";
            buttonColors = "bg-blue-50 text-blue-500 hover:text-blue-800";
            iconClass = "fa-solid fa-circle-info";
            break;
    }

    const div = document.createElement("div");
    div.classList = `flex items-center p-4 mb-4 border-t-4 ${divColors}  z-50 ${position} opacity-0 -translate-y-full transition-all`;

    const icon = document.createElement("i");
    icon.classList = iconClass;

    const messageDiv = document.createElement("div");
    messageDiv.classList = "ml-3 text-sm font-medium";
    messageDiv.innerHTML = message;

    const button = document.createElement("button");
    button.type = "button";
    button.classList = `ml-auto -mx-1.5 -my-1.5 rounded-lg  p-1.5 hover:text-blue-800 inline-flex items-center justify-center h-8 w-8 ${buttonColors}`;

    const buttonIcon = document.createElement("i");
    buttonIcon.classList = "fa-solid fa-xmark";

    button.appendChild(buttonIcon);

    div.appendChild(icon);
    div.appendChild(messageDiv);
    div.appendChild(button);

    flashContainer.appendChild(div);

    const close = () => {
        div.classList.remove("visible", "opacity-100", "translate-y-0");
        div.classList.add("invisible", "opacity-0", "-translate-y-full");

        setTimeout(() => {
            div.remove();
        }, parseFloat(getComputedStyle(div).getPropertyValue("transition-duration")) * 1000);
    };

    button.addEventListener("click", close);

    setTimeout(() => {
        div.classList.add("visible", "opacity-100", "translate-y-0");
        div.classList.remove("opacity-0", "-translate-y-full");
    }, 1);

    setTimeout(() => {
        close();
    }, event.detail.duration ?? 3000);
});
