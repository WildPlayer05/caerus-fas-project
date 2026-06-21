<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
@include('components.navbar')
<br>
    <div>
        <h1 class="text-center text-4xl mx-2 sm:mx-auto">Carbon Footprint</h1>
        <br>
        <p class="font-light text-lg text-center">At Caerus, we believe in the power of collective action to combat climate change.</p>
    </div>

    <div class="w-full grid grid-cols-1 justify-items-center py-8 lg:px-6 sm:py-16">

        <!-- Progress Bar -->
        <div class="w-11/12 max-w-[835.2px] sm:w-2/3 lg:w-3/5 bg-gray-200 rounded-full h-2.5">
            <div id="progressBar" class="bg-blue-600 h-2.5 rounded-full"></div>
        </div>

        <!-- Questions -->
        <div class="mt-4 h-96 w-11/12 max-w-[831.2px] sm:w-2/3 lg:w-3/5 rounded rounded-lg border-2 border-gray-300 text-balance">

            <!-- Question 1 -->
            <div class="grid grid-cols-1 justify-items-center" id="question1">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    Which type of home is most similar to your home?
                </label>

                <div class="pt-12 px-2.5">
                    <div class="flex items-center">
                        <input checked id="houseType-1" type="radio" value="Single-family house" name="houseType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="houseType-1" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Single-family house</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="houseType-2" type="radio" value="Popular development" name="houseType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="houseType-2" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Popular development</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="houseType-3" type="radio" value="Multi-family building" name="houseType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="houseType-3" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Multi-family building</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="houseType-4" type="radio" value="Condominium" name="houseType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="houseType-4" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Condominium</label>
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question2">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    What size is your house?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input value="1" min="1" type="number" min="0" name="houseSize" id="houseSize" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question3">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    How much electricity in KW/h do you use per month?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input @auth value="{{$ele}}" @else value="0" @endauth type="number" name="electricityKW" id="electricityKW" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question4">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    How much gas in cubic meter do you use per month?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input @auth value="{{$gas}}" @else value="0" @endauth type="number" min="0" name="gasCubicMeter" id="gasCubicMeter" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question5">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    How many kilometers do you travel by car weekly?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input type="number" min="0" value="0" name="carTravel" id="carTravel" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 6 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question6">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    What type of alimentation does your vehicle use?
                </label>

                <div class="pt-12 px-2.5">
                    <div class="flex items-center">
                        <input checked id="fuelType-1" type="radio" value="diesel" name="fuelType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="fuelType-1" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Diesel</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="fuelType-2" type="radio" value="petrol" name="fuelType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="fuelType-2" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Petrol</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="fuelType-3" type="radio" value="naturalGas" name="fuelType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="fuelType-3" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Natural Gas</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="fuelType-4" type="radio" value="carElec" name="fuelType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="fuelType-4" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Electricity</label>
                    </div>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question7">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    What is the average fuel consumption of your vehicle (liter / 100km)?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input type="number" value="1" min="1" step="0.1" name="fuelConsumption" id="fuelConsumption" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question8">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    How many kilometers do you travel by public transport weekly?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input value="0" min="0" type="number" name="publicTransport" id="publicTransport" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 9 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question9">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    How many hours do you travel by plane each year?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input value="0" min="0" type="number" name="planeTravel" id="planeTravel" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 10 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question10">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    How much waste in kilograms do you estimate you produce per week?
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 pt-12">
                    <input value="1" min="1" step="0.5" type="number" name="waste" id="waste" class="text-center sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                </div>
            </div>

            <!-- Question 11 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question11">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    Do you participate in a recycling program?
                </label>

                <div class="pt-12 px-2.5">
                    <div class="flex items-center">
                        <input checked id="recycle-1" type="radio" value="" name="recycle" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="recycle-1" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="recycle-2" type="radio" value="" name="recycle" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="recycle-2" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">No</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="recycle-3" type="radio" value="" name="recycle" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="recycle-3" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">No, but I want to</label>
                    </div>
                </div>
            </div>

            <!-- Question 12 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question12">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    Describe your average diet:
                </label>

                <div class="pt-12 px-2.5">
                    <div class="flex items-center">
                        <input checked id="dietType-1" type="radio" value="highMeat" name="dietType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="dietType-1" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">High in meat</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="dietType-2" type="radio" value="moderateMeat" name="dietType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="dietType-2" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Moderate meat consumption</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="dietType-3" type="radio" value="lowMeat" name="dietType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="dietType-3" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Low meat consumption</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="dietType-4" type="radio" value="vegetarian" name="dietType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="dietType-4" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Vegetarian</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="dietType-5" type="radio" value="vegan" name="dietType" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="dietType-5" class="ms-4 text-lg sm:text-xl font-medium text-gray-900">Vegan</label>
                    </div>
                </div>
            </div>

            <!-- Question 13 -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question13">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    How much of the food you eat is fresh, unpackaged or locally grown?
                </label>
                <div class="pt-12 px-2.5">
                    <div class="flex items-center">
                        <input checked id="locally-1" type="radio" value="0.25" name="locally" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="locally-1" class="ms-4 text-xl font-medium text-gray-900">0-25%</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="locally-2" type="radio" value="0.50" name="locally" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="locally-2" class="ms-4 text-xl font-medium text-gray-900">26-50%</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="locally-3" type="radio" value="0.75" name="locally" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="locally-3" class="ms-4 text-xl font-medium text-gray-900">51-75%</label>
                    </div>
                    <div class="flex items-center pt-4">
                        <input id="locally-4" type="radio" value="1.00" name="locally" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300">
                        <label for="locally-4" class="ms-4 text-xl font-medium text-gray-900">76-100%</label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="hidden grid grid-cols-1 justify-items-center" id="question14">
                <label for="PriceE" class="w-11/12 block mt-4 text-xl sm:text-2xl text-center font-black text-gray-900">
                    Calculate your carbon footprint!
                </label>
                <div class="w-11/12 sm:w-3/5 max-w-96 mt-32 flex justify-center">
                    <button onclick="calculateCarbonFootprint()" type="button" class="flex justify-center items-center text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-center px-5 py-2.5 w-36">
                    Calculate
                    </button>
                </div>
            </div>

            <!-- Results -->
            <!-- Alert o pagina a parte? -->
        </div>

        <!-- Buttons -->
        <div class="text-sm sm:text-xl mt-4 w-11/12 max-w-[835.2px] sm:w-2/3 lg:w-3/5 flex justify-between">
            <button disabled id="previuosButton" onclick="previuosQuestion()" type="button" class="flex justify-center items-center text-white bg-gray-400 font-medium rounded-lg text-center px-5 py-2.5 sm:w-40 w-32">
                <svg class="w-3.5 h-3.5 me-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Previous
            </button>

            <button id="nextButton" onclick="nextQuestion()" type="button" class="flex justify-center items-center text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-center px-5 py-2.5 sm:w-40 w-32">
                Next
                <svg class="w-3.5 h-3.5 ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </button>

        </div>
    </div>

    <script>
        let nQuestion = 14;
        var question = 1;

        const progressBar = document.getElementById('progressBar');
        progressBar.style.width = (question / nQuestion * 100 - 2) + "%";

        function nextQuestion() {
            if (question == nQuestion - 1) {
                var next = document.getElementById('nextButton');
                next.classList.remove('bg-blue-600');
                next.classList.remove('hover:bg-blue-700');
                next.classList.add('bg-gray-400');
                next.setAttribute("disabled", "");
            }

            if (question == 1) {
                var previous = document.getElementById('previuosButton');
                previous.classList.add('bg-blue-600');
                previous.classList.add('hover:bg-blue-700');
                previous.classList.remove('bg-gray-400');
                previous.removeAttribute("disabled");
            }

            if (question == nQuestion) return;

            var current = document.getElementById('question' + question);
            current.classList.add('hidden');

            question = question + 1;
            if (question == 6 && document.getElementById('carTravel').value == 0) question = 8;

            var next = document.getElementById('question' + question);
            if (next) {
                next.classList.remove('hidden');
            }

            progressBar.style.width = (question / nQuestion * 100 - 2) + "%";
        }

        function previuosQuestion() {
            if (question == 1) return;

            if (question == 2) {
                var previous = document.getElementById('previuosButton');
                previous.classList.remove('bg-blue-600');
                previous.classList.remove('hover:bg-blue-700');
                previous.classList.add('bg-gray-400');
                previous.setAttribute("disabled", "");
            }

            if (question == nQuestion) {
                var next = document.getElementById('nextButton');
                next.classList.add('bg-blue-600');
                next.classList.add('hover:bg-blue-700');
                next.classList.remove('bg-gray-400');
                next.removeAttribute("disabled");
            }

            var current = document.getElementById('question' + question);
            current.classList.add('hidden');

            question = question - 1;
            if (question == 7 && document.getElementById('carTravel').value == 0) question = 5;

            var previous = document.getElementById('question' + question);
            if (previous) {
                previous.classList.remove('hidden');
            }

            progressBar.style.width = (question / nQuestion * 100 - 2) + "%";
        }

function calculateCarbonFootprint() {

    //Indici di calcolo
    const emissionFactors = {
        electricity: 0.233,
        gas: 1.884,
        diesel: 2.68,
        petrol: 2.31,
        naturalGas: 2.75,
        publicTransport: 0.104,
        carElec: 0,
        plane: 0.254,
        heating: {
            'Single-family house': 0.14,
            'Popular development': 0.11,
            'Multi-family building': 0.09,
            'Condominium': 0.10
        },
        highMeat: 3300,
        moderateMeat: 2500,
        lowMeat: 1900,
        vegetarian: 1300,
        vegan: 1000
    };

    const dietEmissionFactors = {
        highMeat: 3300,
        moderateMeat: 2500,
        lowMeat: 1900,
        vegetarian: 1300,
        vegan: 1000
    };

    //Input
    const electricityUsage = parseFloat(document.getElementById('electricityKW').value);
    const gasUsage = parseFloat(document.getElementById('gasCubicMeter').value);
    const publicTransport = parseFloat(document.getElementById('publicTransport').value);
    const planeTravel = parseFloat(document.getElementById('planeTravel').value);
    const houseType = document.querySelector('input[name="houseType"]:checked').value;
    const houseSize = parseFloat(document.getElementById('houseSize').value);
    const carTravel = parseFloat(document.getElementById('carTravel').value);
    const fuelType = document.querySelector('input[name="fuelType"]:checked').value;
    const fuelConsumption = parseFloat(document.getElementById('fuelConsumption').value);
    const waste = parseFloat(document.getElementById('waste').value);
    const dietType = document.querySelector('input[name="dietType"]:checked').value;
    const locallyGrownPercentage = parseFloat(document.querySelector('input[name="locally"]:checked').value);

    //Calcolo footprint
    const annualCarEmissions = (carTravel * fuelConsumption / 100) * emissionFactors[fuelType] * 52;
    const annualElectricityEmissions = electricityUsage * emissionFactors.electricity * 12;
    const annualGasEmissions = gasUsage * emissionFactors.gas * 12;
    const annualPublicTransportEmissions = publicTransport * emissionFactors.publicTransport * 52;
    const annualPlaneEmissions = planeTravel * emissionFactors.plane;
    const annualHeatingEmissions = houseSize * emissionFactors.heating[houseType] * 12;
    const annualWaste = waste * 0.5 * 52;
    var annualDietEmissions = dietEmissionFactors[dietType];
    annualDietEmissions -= annualDietEmissions * locallyGrownPercentage * 0.2;

    //Footprint totale
    //const totalAnnualCarbonFootprint = annualCarEmissions + annualElectricityEmissions + annualGasEmissions + annualPublicTransportEmissions +
    //annualPlaneEmissions + annualHeatingEmissions + annualWaste + annualDietEmissions;
    const totalAnnualCarbonFootprint = annualCarEmissions + annualElectricityEmissions + annualGasEmissions + annualPublicTransportEmissions +
    annualPlaneEmissions + annualWaste + annualDietEmissions;
    alert(`Your total annual carbon footprint is ${totalAnnualCarbonFootprint.toFixed(2)} kg CO2e.`);
}


    </script>

    @include('components.footer')
</body>
