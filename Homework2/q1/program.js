function middle(x, y, z) {
    if (x > y) {
        if (y > z)
            return y;
        else if (x > z)
            return z;
        else
            return x;
    } else {
        if (x > z)
            return x;
        else if (y > z)
            return z;
        else
            return y;
    }
}

function factors(n) {
    var nFactorial = [];
    var i;

    for (i = 0; i <= n; i++)
        if (n % i === 0)
            nFactorial.push(i)

    return nFactorial.toString();
}

function tax(income, mStatus) {
    var taxAmount;
    var taxRate;

    mStatus = mStatus.toUpperCase();

    if (mStatus == "SINGLE") {
        if (income < 30000)
            taxRate = 0.20;
        else
            taxRate = 0.25;
    } else if (mStatus == "MARRIED") {
        if (income < 50000)
            taxRate = 0.10;
        else
            taxRate = 0.15;
    }

    taxAmount = income * taxRate;

    return taxAmount.toFixed(2);
}

function stdDev() {
    const args = Array.from(arguments);
    var sum = 0;
    var i;
    var m;
    var difference;
    var standardDeviation;
    var j;
    var differenceSquared;
    var sumOfDiffSquare = 0;
    var variance

    // Less than 2 arguments Standard Deviation is 0
    if (args.length < 2)
        standardDeviation = 0;
    // Calculate Standard Deviation
    else {
        // Get Sum or arguments
        for (i = 0; i < args.length; i++)
            sum = sum + args[i];

        // Get mean average of arguments
        m = sum / args.length;

        // Take each number, subtract the mean and square the result
        for (j = 0; j < args.length; j++) {
            difference = args[j] - m;
            differenceSquared = Math.pow(difference, 2)
                // Sum of differences squared
            sumOfDiffSquare = sumOfDiffSquare + differenceSquared;

            // Calculate the variance
            variance = sumOfDiffSquare / args.length;
        }

        standardDeviation = Math.sqrt(variance);
    }

    return standardDeviation;
}

// Assuming this is supposed to be to the power of n and not times (or multiplied by) n.
function compoundInterest(p, r, n) {
    return Math.pow(p * (1 + (r / 100)), n);
}

function typeOfCharacter(character) {
    var type = typeof(character);

    if (type == "string") {
        if (character == character.toUpperCase())
            type = " upper";
        else if (character == character.toLowerCase())
            type = "lower";
    } else if (type == "number")
        type = "digit";
    else
        type = "other";

    return type;
}

function createIdPassword(lName, fName) {
    var lastName = lName
    var firstName = fName

    const lastArgs = Array.from(lastName);
    const firstArgs = Array.from(firstName);

    var person = new Object();

    person.id = (firstArgs[0] + lName).toUpperCase();

    person.password = (firstArgs[0] + // First letter of First name
        firstArgs[firstArgs.length - 1] + // Last Letter of First Name
        lastArgs[0] + // First three of last name
        lastArgs[1] +
        lastArgs[2] +
        firstArgs.length + // Length of First Name
        lastArgs.length).toUpperCase(); //Length of last name

    return person;
}

function removeDuplicates(stringArray) {
    var arrayLength = stringArray.length;

    for (var i = 0; i < arrayLength; i++)
        for (var j = i + 1; j < arrayLength; j++)
            if (stringArray[j] == stringArray[i]) {
                stringArray.splice(j, 1);
                j--;
                arrayLength--;
            }
    return stringArray;
}

function mySort(studentArray) {
    var arrayLength = studentArray.length;

    for (var i = 0; i < arrayLength; i++) {
        let min = i;

        for (var j = i + 1; j < arrayLength; j++) {

            if (studentArray[j] < studentArray[min])
                min = j;
        }

        if (min != i) {
            // Swapping the elements
            let tmp = studentArray[i];
            studentArray[i] = studentArray[min];
            studentArray[min] = tmp;
        }
    }

    return studentArray;
}

function myReverse(words) {
    var letterArray = [];

    // Create an array of words from a string
    var wordArray = words.split(" ");

    // Reverse the words
    wordArray.reverse();

    // For every other word reverse the characters
    for (var i = 0; i < wordArray.length; i++) {
        if (i % 2 == 0) {
            // Create an array of characters
            letterArray = wordArray[i].split('');
            // Reverse the characters
            letterArray.reverse();
            // Turn into string and remove any commas
            wordArray[i] = letterArray.toString().replace(/\W+/g, "");
        }
    }

    // Combine array of words into a string with spaces instead of commas
    wordArray = wordArray.toString().replace(/\W+/g, " ");

    return wordArray;
}

function ApplyFunctionToArray(f, p) {
    for (let i = 0; i < p.length; i++)
        p[i] = f(p[i]);
    return p;
}

class Student {
    constructor(name, gpa) {
        this.name = name;
        this.gpa = gpa;
    }

    setName(name) {
        this.name = name;
    }

    getName() {
        return this.name;
    }

    setGpa(gpa) {
        this.gpa = gpa;
    }

    getGpa() {
        return this.gpa;
    }

    isHonors() {
        if (this.gpa > 3)
            return true;
        return false;
    }
}

function university(idString) {
    var reId = /^[E]-\d{3}[a-z]-\d[a-z]{2}\d/;
    var rePhone = /\b(313|248|734)-\b\d{3}-\d{4}$/;

    if (idString.search(reId) == 0)
        return true;
    else
        return false;
}

function fullName(name) {
    var nameArray = name.split(" ");
    var rePrefix = /\bM(?:rs?|s)\b/;
    var reName = /^[A-Z][a-z]+$/;
    var reMInitial = /^[A-Z]\./;


    if (nameArray.length == 4) {
        if (nameArray[0].search(rePrefix) == 0 &&
            nameArray[1].search(reName) == 0 &&
            nameArray[2].search(reMInitial) == 0 &&
            nameArray[3].search(reName) == 0)
            return true;
        else return false;
    } else
        return false;
}