// 1. Handle the exception caused by printing a variable without declaring it
try {
    console.log(myVariable); // Attempt to print an undeclared variable
} catch (error) {
    console.error("Error: Variable is not declared -", error.message);
}

// 2. Throw "divide by Zero" error using throw statement
function divide(a, b) {
    if (b === 0) {
        throw new Error("Divide by Zero error");
    }
    return a / b;
}

try {
    console.log(divide(10, 0)); // This will throw an error
} catch (error) {
    console.error("Error:", error.message);
}

// 3. Throw "out of bound error" using throw statement
function accessArrayElement(arr, index) {
    if (index < 0 || index >= arr.length) {
        throw new Error("Out of bound error");
    }
    return arr[index];
}

try {
    const myArray = [1, 2, 3];
    console.log(accessArrayElement(myArray, 5)); // This will throw an error
} catch (error) {
    console.error("Error:", error.message);
}

// 4. Exception handling using finally statement
try {
    let result = 10 / 0; // This will not throw an error in JavaScript but result in Infinity
    console.log(result);
} catch (error) {
    console.error("Error:", error.message);
} finally {
    console.log("This block will always execute, regardless of an error.");
}