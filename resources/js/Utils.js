/**
 *  Various utility functions like generating unique IDs, 
 *  capitalizing strings, and formatting dates.
 */
class Utils {

    /**
     * Generates a unique ID using timestamp and random value
     *
     * @static
     * @returns
     * @memberof Utils
     */
    static generateUniqueId() {
        const timestamp = Date.now().toString(16); // Convert current timestamp to hexadecimal
        const random = Math.random().toString(16).slice(2); // Generate random hexadecimal value

        return `${timestamp}${random}`;
    }

    /**
     * Capitalizes the first letter of a string
     *
     * @static
     * @param {*} str
     * @returns
     * @memberof Utils
     */
    static capitalizeString(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    /**
     * Formats a date object as a human-readable string
     *
     * @static
     * @param {*} date
     * @returns
     * @memberof Utils
     */
    static formatDate(date) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString(undefined, options);
    }
}

export default Utils;
