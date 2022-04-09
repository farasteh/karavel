    export function phoneNumber(value) {
        var phoneRGEX = /^(09|9)[13][0-9]\\d{7}$/;
        console.log(phoneRGEX)
        if(phoneRGEX.test(value)) return true 
    }

    export function notGmail(value = "") {
    return !value.includes("gmail");
    }

    export function isEmailAvailable(value) {
    if (value === "") return true;

    return new Promise((resolve, reject) => {
        setTimeout(() => {
        resolve(value.length > 10);
        }, 500);
    });
    }
  