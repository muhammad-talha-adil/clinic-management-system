import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

/**
 * Global toast notification
 * @param {string} type - success | error | warning | info
 * @param {string} message - The message to show
 */
window.showToast = function(type = "info", message = "") {
    let bg = "#3B82F6"; // Tailwind blue-600
    switch (type) {
        case "success":
            bg = "#16A34A"; // green-600
            break;
        case "error":
            bg = "#DC2626"; // red-600
            break;
        case "warning":
            bg = "#D97706"; // amber-600
            break;
        case "info":
            bg = "#2563EB"; // blue-700
            break;
    }

    Toastify({
        text: message,
        duration: 3000,
        gravity: "top", // top or bottom
        position: "right", // left, center, or right
        backgroundColor: bg,
        stopOnFocus: true, // pause timer on hover
        close: true, // show close button
    }).showToast();
};
