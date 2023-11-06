<?php
require_once 'vendor/autoload.php';
use Mailjet\Client;
use \Mailjet\Resources;
listenToForm();


?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="scss/style.css" type="text/css" rel="stylesheet">
        <title>Title</title>
    </head>
    <body>
    <header>
        <h1 class="text-center">
            Contact our support Team
        </h1>

    </header>
    <main>
        <form id="supportForm" class="mx-auto my-4 p-2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              method="post">
            <div class="mb-3">
                <label class="form-label" for="firstName"> First name : </label>
                <span class="error"><?php displayErrors("firstName"); ?></span>
                <input class="form-control" type="text" id="firstName" value="" name="firstName">

                <label class="form-label" for="lastName"> Last name : </label>
                <span class="error"><?php displayErrors("lastName"); ?></span>

                <input class="form-control" type="text" id="lastName" value="" name="lastName">

                <p class="my-2 py-1">Gender :
                    <span class="error"><?php displayErrors("gender"); ?></span>
                    <input type="radio" id="Female" value="F" name="gender">
                    <label class="form-label" for="Female">Female</label>

                    <input type="radio" id="Male" value="M" name="gender">
                    <label class="form-label" for="Male">Male</label>

                    <input type="radio" id="Other" value="O" name="gender">
                    <label class="form-label" for="Other">Other</label>
                </p>


                <label class="form-label" for="email"> Email : </label>
                <span class="error"><?php displayErrors("email"); ?></span>

                <input class="form-control" type="email" id="email" value="" name="email">

                <p class="my-2 py-1">Country :
                    <span class="error"><?php displayErrors("country"); ?></span>
                    <select name="country" class="col-4">
                        <?php displayCountriesOpt();
                        ?>
                    </select>
                </p>

                <p class="my-2 py-1">Subject:
                    <span class="error"><?php displayErrors("subject"); ?></span>
                    <select name="subject">
                        <option value="Order">Order</option>
                        <option value="Delivery">Delivery</option>
                        <option value="Other" selected="selected">Other</option>
                    </select>
                </p>
                <span class="error"><?php displayErrors("message"); ?></span>
                <textarea class="col-12" id="message" name="message"></textarea>

            </div>

            <input class="btn btn-secondary" type="submit" name="submit" value="Send">

        </form>
    </main>
    </body>
    </html>
<?php

function displayCountriesOpt()
{

    $countries = array("AF" => "Afghanistan",
        "AX" => "Åland Islands",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, The Democratic Republic of The",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, The Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and The Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and The South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.S.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe");

    foreach ($countries as $key => $value) {

        echo '<option value="' . $key . '">' . $value . '</option>';
    }
}


function hasError($errors)
{
    $hasErrors = false;
    foreach ($errors as $error) {
        if (!empty($error)) {
            $hasErrors = true;
        }
    }
    return $hasErrors;

}

function getErrors()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastNameErr = empty($_POST["lastName"]) ? "Last name is required" : "";
        $firstNameErr = empty($_POST["firstName"]) ? "First name is required" : "";
        $genderErr = empty($_POST["gender"]) ? "Gender is required" : "";
        $emailErr = empty($_POST["email"]) ? "Email is required" : "";
        $countryErr = empty($_POST["country"]) ? "Country is required" : "";
        $messageErr = empty($_POST["message"]) ? "Message is required" : "";
        return array(
            "lastName" => $lastNameErr,
            "firstName" => $firstNameErr,
            "gender" => $genderErr,
            "email" => $emailErr,
            "country" => $countryErr,
            "message" => $messageErr
        );
    }

    return array();

}

function displayErrors($name)
{
    $errors = getErrors();
    if (array_key_exists($name, $errors) || !empty($errors[$name])) {
        echo $errors[$name];
    }
}


function listenToForm()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!hasError(getErrors())) {

            $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

            try {

                $isSent = sendEmail($lastName, $firstName, $email, $gender, $country, $subject, $message);

                if ($isSent) {
                    header('Location: successfullMessage.php');
                } else {
                    header('Location: errorMessage.php');
                }
            } catch (Exception $e) {
                echo '<div>Message: ' . $e->getMessage() . '</div>';
            }
        }

    }

}

function sendEmail($lastName, $firstName, $email, $gender, $country, $subject, $message)
{
    $fullName = $firstName . " " . $lastName;
    $genderDisplayed = $gender === 'M' ? 'Male' : ($gender === 'F' ? 'Female' : 'Other');
    $mj = new Client('b09f138efabde3f1b27ec2c5f0eac7f0', 'ff1d23294c5292b4248018a11c6b8149', true, ['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => "richardlayla@hotmail.com",
                    'Name' => "layla"
                ],
                'To' => [
                    [
                        'Email' => $email,
                        'Name' => $fullName]
                ],
                'Subject' => "Your support request",
                'HTMLPart' => "<h3>Your request has been sent to our support team</h3>
                               <p> First Name : $firstName</p>
                               <p> Last Name : $lastName</p>
                               <p> Gender: $genderDisplayed</p>
                               <p> Country: $country</p>
                               <p> Subject: $subject</p>
                               <p> Message: $message</p>
                               "
            ]
        ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    return $response->success();
}

?>