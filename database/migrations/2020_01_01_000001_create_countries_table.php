<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    const TABLE_NAME = 'countries';

    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso_2', 10);
            $table->string('iso_3', 10);
            $table->integer('order')->default(999);
            $table->timestamps();
        });

        $countries = [
            ["name" => "Andorra", "iso_2" => "AD", "iso_3" => "AND", "order" => 999],
            ["name" => "United Arab Emirates", "iso_2" => "AE", "iso_3" => "ARE", "order" => 999],
            ["name" => "Afghanistan", "iso_2" => "AF", "iso_3" => "AFG", "order" => 999],
            ["name" => "Antigua and Barbuda", "iso_2" => "AG", "iso_3" => "ATG", "order" => 999],
            ["name" => "Anguilla", "iso_2" => "AI", "iso_3" => "AIA", "order" => 999],
            ["name" => "Albania", "iso_2" => "AL", "iso_3" => "ALB", "order" => 999],
            ["name" => "Armenia", "iso_2" => "AM", "iso_3" => "ARM", "order" => 999],
            ["name" => "Angola", "iso_2" => "AO", "iso_3" => "AGO", "order" => 999],
            ["name" => "Antarctica", "iso_2" => "AQ", "iso_3" => "ATA", "order" => 999],
            ["name" => "Argentina", "iso_2" => "AR", "iso_3" => "ARG", "order" => 999],
            ["name" => "American Samoa", "iso_2" => "AS", "iso_3" => "ASM", "order" => 999],
            ["name" => "Austria", "iso_2" => "AT", "iso_3" => "AUT", "order" => 19],
            ["name" => "Australia", "iso_2" => "AU", "iso_3" => "AUS", "order" => 15],
            ["name" => "Aruba", "iso_2" => "AW", "iso_3" => "ABW", "order" => 999],
            ["name" => "Åland Islands", "iso_2" => "AX", "iso_3" => "ALA", "order" => 999],
            ["name" => "Azerbaijan", "iso_2" => "AZ", "iso_3" => "AZE", "order" => 999],
            ["name" => "Bosnia and Herzegovina", "iso_2" => "BA", "iso_3" => "BIH", "order" => 999],
            ["name" => "Barbados", "iso_2" => "BB", "iso_3" => "BRB", "order" => 999],
            ["name" => "Bangladesh", "iso_2" => "BD", "iso_3" => "BGD", "order" => 999],
            ["name" => "Belgium", "iso_2" => "BE", "iso_3" => "BEL", "order" => 11],
            ["name" => "Burkina Faso", "iso_2" => "BF", "iso_3" => "BFA", "order" => 999],
            ["name" => "Bulgaria", "iso_2" => "BG", "iso_3" => "BGR", "order" => 999],
            ["name" => "Bahrain", "iso_2" => "BH", "iso_3" => "BHR", "order" => 999],
            ["name" => "Burundi", "iso_2" => "BI", "iso_3" => "BDI", "order" => 999],
            ["name" => "Benin", "iso_2" => "BJ", "iso_3" => "BEN", "order" => 999],
            ["name" => "Saint Barthélemy", "iso_2" => "BL", "iso_3" => "BLM", "order" => 999],
            ["name" => "Bermuda", "iso_2" => "BM", "iso_3" => "BMU", "order" => 999],
            ["name" => "Brunei Darussalam", "iso_2" => "BN", "iso_3" => "BRN", "order" => 999],
            ["name" => "Bolivia", "iso_2" => "BO", "iso_3" => "BOL", "order" => 999],
            ["name" => "Bonaire, Sint Eustatius and Saba", "iso_2" => "BQ", "iso_3" => "BES", "order" => 999],
            ["name" => "Brazil", "iso_2" => "BR", "iso_3" => "BRA", "order" => 999],
            ["name" => "Bahamas", "iso_2" => "BS", "iso_3" => "BHS", "order" => 999],
            ["name" => "Bhutan", "iso_2" => "BT", "iso_3" => "BTN", "order" => 999],
            ["name" => "Bouvet Island", "iso_2" => "BV", "iso_3" => "BVT", "order" => 999],
            ["name" => "Botswana", "iso_2" => "BW", "iso_3" => "BWA", "order" => 999],
            ["name" => "Belarus", "iso_2" => "BY", "iso_3" => "BLR", "order" => 999],
            ["name" => "Belize", "iso_2" => "BZ", "iso_3" => "BLZ", "order" => 999],
            ["name" => "Canada", "iso_2" => "CA", "iso_3" => "CAN", "order" => 17],
            ["name" => "Cocos (Keeling] Islands", "iso_2" => "CC", "iso_3" => "CCK", "order" => 999],
            ["name" => "Congo", "iso_2" => "CD", "iso_3" => "COD", "order" => 999],
            ["name" => "Central African Republic", "iso_2" => "CF", "iso_3" => "CAF", "order" => 999],
            ["name" => "Congo", "iso_2" => "CG", "iso_3" => "COG", "order" => 999],
            ["name" => "Switzerland", "iso_2" => "CH", "iso_3" => "CHE", "order" => 999],
            ["name" => "Côte d'Ivoire", "iso_2" => "CI", "iso_3" => "CIV", "order" => 999],
            ["name" => "Cook Islands", "iso_2" => "CK", "iso_3" => "COK", "order" => 999],
            ["name" => "Chile", "iso_2" => "CL", "iso_3" => "CHL", "order" => 999],
            ["name" => "Cameroon", "iso_2" => "CM", "iso_3" => "CMR", "order" => 999],
            ["name" => "China", "iso_2" => "CN", "iso_3" => "CHN", "order" => 999],
            ["name" => "Colombia", "iso_2" => "CO", "iso_3" => "COL", "order" => 999],
            ["name" => "Costa Rica", "iso_2" => "CR", "iso_3" => "CRI", "order" => 999],
            ["name" => "Cuba", "iso_2" => "CU", "iso_3" => "CUB", "order" => 999],
            ["name" => "Cabo Verde", "iso_2" => "CV", "iso_3" => "CPV", "order" => 999],
            ["name" => "Curaçao", "iso_2" => "CW", "iso_3" => "CUW", "order" => 999],
            ["name" => "Christmas Island", "iso_2" => "CX", "iso_3" => "CXR", "order" => 999],
            ["name" => "Cyprus", "iso_2" => "CY", "iso_3" => "CYP", "order" => 21],
            ["name" => "Czech Republic", "iso_2" => "CZ", "iso_3" => "CZE", "order" => 22],
            ["name" => "Germany", "iso_2" => "DE", "iso_3" => "DEU", "order" => 4],
            ["name" => "Djibouti", "iso_2" => "DJ", "iso_3" => "DJI", "order" => 999],
            ["name" => "Denmark", "iso_2" => "DK", "iso_3" => "DNK", "order" => 14],
            ["name" => "Dominica", "iso_2" => "DM", "iso_3" => "DMA", "order" => 999],
            ["name" => "Dominican Republic", "iso_2" => "DO", "iso_3" => "DOM", "order" => 999],
            ["name" => "Algeria", "iso_2" => "DZ", "iso_3" => "DZA", "order" => 999],
            ["name" => "Ecuador", "iso_2" => "EC", "iso_3" => "ECU", "order" => 999],
            ["name" => "Estonia", "iso_2" => "EE", "iso_3" => "EST", "order" => 999],
            ["name" => "Egypt", "iso_2" => "EG", "iso_3" => "EGY", "order" => 23],
            ["name" => "Western Sahara", "iso_2" => "EH", "iso_3" => "ESH", "order" => 999],
            ["name" => "Eritrea", "iso_2" => "ER", "iso_3" => "ERI", "order" => 999],
            ["name" => "Spain", "iso_2" => "ES", "iso_3" => "ESP", "order" => 7],
            ["name" => "Ethiopia", "iso_2" => "ET", "iso_3" => "ETH", "order" => 999],
            ["name" => "Finland", "iso_2" => "FI", "iso_3" => "FIN", "order" => 999],
            ["name" => "Fiji", "iso_2" => "FJ", "iso_3" => "FJI", "order" => 999],
            ["name" => "Falkland Islands (Malvinas]", "iso_2" => "FK", "iso_3" => "FLK", "order" => 999],
            ["name" => "Micronesia (Federated States of]", "iso_2" => "FM", "iso_3" => "FSM", "order" => 999],
            ["name" => "Faroe Islands", "iso_2" => "FO", "iso_3" => "FRO", "order" => 999],
            ["name" => "France", "iso_2" => "FR", "iso_3" => "FRA", "order" => 5],
            ["name" => "Gabon", "iso_2" => "GA", "iso_3" => "GAB", "order" => 999],
            ["name" => "United Kingdom", "iso_2" => "GB", "iso_3" => "GBR", "order" => 1],
            ["name" => "Grenada", "iso_2" => "GD", "iso_3" => "GRD", "order" => 999],
            ["name" => "Georgia", "iso_2" => "GE", "iso_3" => "GEO", "order" => 999],
            ["name" => "French Guiana", "iso_2" => "GF", "iso_3" => "GUF", "order" => 999],
            ["name" => "Guernsey", "iso_2" => "GG", "iso_3" => "GGY", "order" => 999],
            ["name" => "Ghana", "iso_2" => "GH", "iso_3" => "GHA", "order" => 999],
            ["name" => "Gibraltar", "iso_2" => "GI", "iso_3" => "GIB", "order" => 999],
            ["name" => "Greenland", "iso_2" => "GL", "iso_3" => "GRL", "order" => 999],
            ["name" => "Gambia", "iso_2" => "GM", "iso_3" => "GMB", "order" => 999],
            ["name" => "Guinea", "iso_2" => "GN", "iso_3" => "GIN", "order" => 999],
            ["name" => "Guadeloupe", "iso_2" => "GP", "iso_3" => "GLP", "order" => 999],
            ["name" => "Equatorial Guinea", "iso_2" => "GQ", "iso_3" => "GNQ", "order" => 999],
            ["name" => "Greece", "iso_2" => "GR", "iso_3" => "GRC", "order" => 24],
            ["name" => "South Georgia and the South Sandwich Islands", "iso_2" => "GS", "iso_3" => "SGS", "order" => 999],
            ["name" => "Guatemala", "iso_2" => "GT", "iso_3" => "GTM", "order" => 999],
            ["name" => "Guam", "iso_2" => "GU", "iso_3" => "GUM", "order" => 999],
            ["name" => "Guinea-Bissau", "iso_2" => "GW", "iso_3" => "GNB", "order" => 999],
            ["name" => "Guyana", "iso_2" => "GY", "iso_3" => "GUY", "order" => 999],
            ["name" => "Hong Kong", "iso_2" => "HK", "iso_3" => "HKG", "order" => 999],
            ["name" => "Heard Island and McDonald Islands", "iso_2" => "HM", "iso_3" => "HMD", "order" => 999],
            ["name" => "Honduras", "iso_2" => "HN", "iso_3" => "HND", "order" => 999],
            ["name" => "Croatia", "iso_2" => "HR", "iso_3" => "HRV", "order" => 20],
            ["name" => "Haiti", "iso_2" => "HT", "iso_3" => "HTI", "order" => 999],
            ["name" => "Hungary", "iso_2" => "HU", "iso_3" => "HUN", "order" => 25],
            ["name" => "Indonesia", "iso_2" => "ID", "iso_3" => "IDN", "order" => 999],
            ["name" => "Ireland", "iso_2" => "IE", "iso_3" => "IRL", "order" => 3],
            ["name" => "Israel", "iso_2" => "IL", "iso_3" => "ISR", "order" => 999],
            ["name" => "Isle of Man", "iso_2" => "IM", "iso_3" => "IMN", "order" => 999],
            ["name" => "India", "iso_2" => "IN", "iso_3" => "IND", "order" => 999],
            ["name" => "British Indian Ocean Territory", "iso_2" => "IO", "iso_3" => "IOT", "order" => 999],
            ["name" => "Iraq", "iso_2" => "IQ", "iso_3" => "IRQ", "order" => 999],
            ["name" => "Iran (Islamic Republic of]", "iso_2" => "IR", "iso_3" => "IRN", "order" => 999],
            ["name" => "Iceland", "iso_2" => "IS", "iso_3" => "ISL", "order" => 999],
            ["name" => "Italy", "iso_2" => "IT", "iso_3" => "ITA", "order" => 6],
            ["name" => "Jersey", "iso_2" => "JE", "iso_3" => "JEY", "order" => 999],
            ["name" => "Jamaica", "iso_2" => "JM", "iso_3" => "JAM", "order" => 999],
            ["name" => "Jordan", "iso_2" => "JO", "iso_3" => "JOR", "order" => 999],
            ["name" => "Japan", "iso_2" => "JP", "iso_3" => "JPN", "order" => 999],
            ["name" => "Kenya", "iso_2" => "KE", "iso_3" => "KEN", "order" => 999],
            ["name" => "Kyrgyzstan", "iso_2" => "KG", "iso_3" => "KGZ", "order" => 999],
            ["name" => "Cambodia", "iso_2" => "KH", "iso_3" => "KHM", "order" => 999],
            ["name" => "Kiribati", "iso_2" => "KI", "iso_3" => "KIR", "order" => 999],
            ["name" => "Comoros", "iso_2" => "KM", "iso_3" => "COM", "order" => 999],
            ["name" => "Saint Kitts and Nevis", "iso_2" => "KN", "iso_3" => "KNA", "order" => 999],
            ["name" => "Korea (Democratic People's Republic of]", "iso_2" => "KP", "iso_3" => "PRK", "order" => 999],
            ["name" => "Korea (Republic of]", "iso_2" => "KR", "iso_3" => "KOR", "order" => 999],
            ["name" => "Kuwait", "iso_2" => "KW", "iso_3" => "KWT", "order" => 999],
            ["name" => "Cayman Islands", "iso_2" => "KY", "iso_3" => "CYM", "order" => 999],
            ["name" => "Kazakhstan", "iso_2" => "KZ", "iso_3" => "KAZ", "order" => 999],
            ["name" => "Lao People's Democratic Republic", "iso_2" => "LA", "iso_3" => "LAO", "order" => 999],
            ["name" => "Lebanon", "iso_2" => "LB", "iso_3" => "LBN", "order" => 999],
            ["name" => "Saint Lucia", "iso_2" => "LC", "iso_3" => "LCA", "order" => 999],
            ["name" => "Liechtenstein", "iso_2" => "LI", "iso_3" => "LIE", "order" => 999],
            ["name" => "Sri Lanka", "iso_2" => "LK", "iso_3" => "LKA", "order" => 999],
            ["name" => "Liberia", "iso_2" => "LR", "iso_3" => "LBR", "order" => 999],
            ["name" => "Lesotho", "iso_2" => "LS", "iso_3" => "LSO", "order" => 999],
            ["name" => "Lithuania", "iso_2" => "LT", "iso_3" => "LTU", "order" => 26],
            ["name" => "Luxembourg", "iso_2" => "LU", "iso_3" => "LUX", "order" => 999],
            ["name" => "Latvia", "iso_2" => "LV", "iso_3" => "LVA", "order" => 999],
            ["name" => "Libya", "iso_2" => "LY", "iso_3" => "LBY", "order" => 999],
            ["name" => "Morocco", "iso_2" => "MA", "iso_3" => "MAR", "order" => 999],
            ["name" => "Monaco", "iso_2" => "MC", "iso_3" => "MCO", "order" => 999],
            ["name" => "Moldova (Republic of]", "iso_2" => "MD", "iso_3" => "MDA", "order" => 999],
            ["name" => "Montenegro", "iso_2" => "ME", "iso_3" => "MNE", "order" => 999],
            ["name" => "Saint Martin (French part]", "iso_2" => "MF", "iso_3" => "MAF", "order" => 999],
            ["name" => "Madagascar", "iso_2" => "MG", "iso_3" => "MDG", "order" => 999],
            ["name" => "Marshall Islands", "iso_2" => "MH", "iso_3" => "MHL", "order" => 999],
            ["name" => "Macedonia (the former Yugoslav Republic of]", "iso_2" => "MK", "iso_3" => "MKD", "order" => 999],
            ["name" => "Mali", "iso_2" => "ML", "iso_3" => "MLI", "order" => 999],
            ["name" => "Myanmar", "iso_2" => "MM", "iso_3" => "MMR", "order" => 999],
            ["name" => "Mongolia", "iso_2" => "MN", "iso_3" => "MNG", "order" => 999],
            ["name" => "Macao", "iso_2" => "MO", "iso_3" => "MAC", "order" => 999],
            ["name" => "Northern Mariana Islands", "iso_2" => "MP", "iso_3" => "MNP", "order" => 999],
            ["name" => "Martinique", "iso_2" => "MQ", "iso_3" => "MTQ", "order" => 999],
            ["name" => "Mauritania", "iso_2" => "MR", "iso_3" => "MRT", "order" => 999],
            ["name" => "Montserrat", "iso_2" => "MS", "iso_3" => "MSR", "order" => 999],
            ["name" => "Malta", "iso_2" => "MT", "iso_3" => "MLT", "order" => 999],
            ["name" => "Mauritius", "iso_2" => "MU", "iso_3" => "MUS", "order" => 999],
            ["name" => "Maldives", "iso_2" => "MV", "iso_3" => "MDV", "order" => 999],
            ["name" => "Malawi", "iso_2" => "MW", "iso_3" => "MWI", "order" => 999],
            ["name" => "Mexico", "iso_2" => "MX", "iso_3" => "MEX", "order" => 999],
            ["name" => "Malaysia", "iso_2" => "MY", "iso_3" => "MYS", "order" => 999],
            ["name" => "Mozambique", "iso_2" => "MZ", "iso_3" => "MOZ", "order" => 999],
            ["name" => "Namibia", "iso_2" => "NA", "iso_3" => "NAM", "order" => 999],
            ["name" => "New Caledonia", "iso_2" => "NC", "iso_3" => "NCL", "order" => 999],
            ["name" => "Niger", "iso_2" => "NE", "iso_3" => "NER", "order" => 999],
            ["name" => "Norfolk Island", "iso_2" => "NF", "iso_3" => "NFK", "order" => 999],
            ["name" => "Nigeria", "iso_2" => "NG", "iso_3" => "NGA", "order" => 999],
            ["name" => "Nicaragua", "iso_2" => "NI", "iso_3" => "NIC", "order" => 999],
            ["name" => "Netherlands", "iso_2" => "NL", "iso_3" => "NLD", "order" => 9],
            ["name" => "Norway", "iso_2" => "NO", "iso_3" => "NOR", "order" => 12],
            ["name" => "Nepal", "iso_2" => "NP", "iso_3" => "NPL", "order" => 999],
            ["name" => "Nauru", "iso_2" => "NR", "iso_3" => "NRU", "order" => 999],
            ["name" => "Niue", "iso_2" => "NU", "iso_3" => "NIU", "order" => 999],
            ["name" => "New Zealand", "iso_2" => "NZ", "iso_3" => "NZL", "order" => 16],
            ["name" => "Oman", "iso_2" => "OM", "iso_3" => "OMN", "order" => 999],
            ["name" => "Panama", "iso_2" => "PA", "iso_3" => "PAN", "order" => 999],
            ["name" => "Peru", "iso_2" => "PE", "iso_3" => "PER", "order" => 999],
            ["name" => "French Polynesia", "iso_2" => "PF", "iso_3" => "PYF", "order" => 999],
            ["name" => "Papua New Guinea", "iso_2" => "PG", "iso_3" => "PNG", "order" => 999],
            ["name" => "Philippines", "iso_2" => "PH", "iso_3" => "PHL", "order" => 999],
            ["name" => "Pakistan", "iso_2" => "PK", "iso_3" => "PAK", "order" => 999],
            ["name" => "Poland", "iso_2" => "PL", "iso_3" => "POL", "order" => 10],
            ["name" => "Saint Pierre and Miquelon", "iso_2" => "PM", "iso_3" => "SPM", "order" => 999],
            ["name" => "Pitcairn", "iso_2" => "PN", "iso_3" => "PCN", "order" => 999],
            ["name" => "Puerto Rico", "iso_2" => "PR", "iso_3" => "PRI", "order" => 999],
            ["name" => "Palestine, State of", "iso_2" => "PS", "iso_3" => "PSE", "order" => 999],
            ["name" => "Portugal", "iso_2" => "PT", "iso_3" => "PRT", "order" => 8],
            ["name" => "Palau", "iso_2" => "PW", "iso_3" => "PLW", "order" => 999],
            ["name" => "Paraguay", "iso_2" => "PY", "iso_3" => "PRY", "order" => 999],
            ["name" => "Qatar", "iso_2" => "QA", "iso_3" => "QAT", "order" => 999],
            ["name" => "Réunion", "iso_2" => "RE", "iso_3" => "REU", "order" => 999],
            ["name" => "Romania", "iso_2" => "RO", "iso_3" => "ROU", "order" => 999],
            ["name" => "Serbia", "iso_2" => "RS", "iso_3" => "SRB", "order" => 999],
            ["name" => "Russian Federation", "iso_2" => "RU", "iso_3" => "RUS", "order" => 999],
            ["name" => "Rwanda", "iso_2" => "RW", "iso_3" => "RWA", "order" => 999],
            ["name" => "Saudi Arabia", "iso_2" => "SA", "iso_3" => "SAU", "order" => 999],
            ["name" => "Solomon Islands", "iso_2" => "SB", "iso_3" => "SLB", "order" => 999],
            ["name" => "Seychelles", "iso_2" => "SC", "iso_3" => "SYC", "order" => 999],
            ["name" => "Sudan", "iso_2" => "SD", "iso_3" => "SDN", "order" => 999],
            ["name" => "Sweden", "iso_2" => "SE", "iso_3" => "SWE", "order" => 13],
            ["name" => "Singapore", "iso_2" => "SG", "iso_3" => "SGP", "order" => 999],
            ["name" => "Saint Helena, Ascension and Tristan da Cunha", "iso_2" => "SH", "iso_3" => "SHN", "order" => 999],
            ["name" => "Slovenia", "iso_2" => "SI", "iso_3" => "SVN", "order" => 999],
            ["name" => "Svalbard and Jan Mayen", "iso_2" => "SJ", "iso_3" => "SJM", "order" => 999],
            ["name" => "Slovakia", "iso_2" => "SK", "iso_3" => "SVK", "order" => 999],
            ["name" => "Sierra Leone", "iso_2" => "SL", "iso_3" => "SLE", "order" => 999],
            ["name" => "San Marino", "iso_2" => "SM", "iso_3" => "SMR", "order" => 999],
            ["name" => "Senegal", "iso_2" => "SN", "iso_3" => "SEN", "order" => 999],
            ["name" => "Somalia", "iso_2" => "SO", "iso_3" => "SOM", "order" => 999],
            ["name" => "Suriname", "iso_2" => "SR", "iso_3" => "SUR", "order" => 999],
            ["name" => "South Sudan", "iso_2" => "SS", "iso_3" => "SSD", "order" => 999],
            ["name" => "Sao Tome and Principe", "iso_2" => "ST", "iso_3" => "STP", "order" => 999],
            ["name" => "El Salvador", "iso_2" => "SV", "iso_3" => "SLV", "order" => 999],
            ["name" => "Sint Maarten (Dutch part]", "iso_2" => "SX", "iso_3" => "SXM", "order" => 999],
            ["name" => "Syrian Arab Republic", "iso_2" => "SY", "iso_3" => "SYR", "order" => 999],
            ["name" => "Swaziland", "iso_2" => "SZ", "iso_3" => "SWZ", "order" => 999],
            ["name" => "Turks and Caicos Islands", "iso_2" => "TC", "iso_3" => "TCA", "order" => 999],
            ["name" => "Chad", "iso_2" => "TD", "iso_3" => "TCD", "order" => 999],
            ["name" => "French Southern Territories", "iso_2" => "TF", "iso_3" => "ATF", "order" => 999],
            ["name" => "Togo", "iso_2" => "TG", "iso_3" => "TGO", "order" => 999],
            ["name" => "Thailand", "iso_2" => "TH", "iso_3" => "THA", "order" => 999],
            ["name" => "Tajikistan", "iso_2" => "TJ", "iso_3" => "TJK", "order" => 999],
            ["name" => "Tokelau", "iso_2" => "TK", "iso_3" => "TKL", "order" => 999],
            ["name" => "Timor-Leste", "iso_2" => "TL", "iso_3" => "TLS", "order" => 999],
            ["name" => "Turkmenistan", "iso_2" => "TM", "iso_3" => "TKM", "order" => 999],
            ["name" => "Tunisia", "iso_2" => "TN", "iso_3" => "TUN", "order" => 999],
            ["name" => "Tonga", "iso_2" => "TO", "iso_3" => "TON", "order" => 999],
            ["name" => "Turkey", "iso_2" => "TR", "iso_3" => "TUR", "order" => 999],
            ["name" => "Trinidad and Tobago", "iso_2" => "TT", "iso_3" => "TTO", "order" => 999],
            ["name" => "Tuvalu", "iso_2" => "TV", "iso_3" => "TUV", "order" => 999],
            ["name" => "Taiwan, Province of China", "iso_2" => "TW", "iso_3" => "TWN", "order" => 999],
            ["name" => "Tanzania, United Republic of", "iso_2" => "TZ", "iso_3" => "TZA", "order" => 999],
            ["name" => "Ukraine", "iso_2" => "UA", "iso_3" => "UKR", "order" => 999],
            ["name" => "Uganda", "iso_2" => "UG", "iso_3" => "UGA", "order" => 999],
            ["name" => "United States Minor Outlying Islands", "iso_2" => "UM", "iso_3" => "UMI", "order" => 999],
            ["name" => "United States of A-merica", "iso_2" => "US", "iso_3" => "USA", "order" => 2],
            ["name" => "Uruguay", "iso_2" => "UY", "iso_3" => "URY", "order" => 999],
            ["name" => "Uzbekistan", "iso_2" => "UZ", "iso_3" => "UZB", "order" => 999],
            ["name" => "Holy See", "iso_2" => "VA", "iso_3" => "VAT", "order" => 999],
            ["name" => "Saint Vincent and the Grenadines", "iso_2" => "VC", "iso_3" => "VCT", "order" => 999],
            ["name" => "Venezuela (Bolivarian Republic of]", "iso_2" => "VE", "iso_3" => "VEN", "order" => 999],
            ["name" => "Virgin Islands (British]", "iso_2" => "VG", "iso_3" => "VGB", "order" => 999],
            ["name" => "Virgin Islands (U.S.]", "iso_2" => "VI", "iso_3" => "VIR", "order" => 999],
            ["name" => "Viet Nam", "iso_2" => "VN", "iso_3" => "VNM", "order" => 999],
            ["name" => "Vanuatu", "iso_2" => "VU", "iso_3" => "VUT", "order" => 999],
            ["name" => "Wallis and Futuna", "iso_2" => "WF", "iso_3" => "WLF", "order" => 999],
            ["name" => "Samoa", "iso_2" => "WS", "iso_3" => "WSM", "order" => 999],
            ["name" => "Yemen", "iso_2" => "YE", "iso_3" => "YEM", "order" => 999],
            ["name" => "Mayotte", "iso_2" => "YT", "iso_3" => "MYT", "order" => 999],
            ["name" => "South Africa", "iso_2" => "ZA", "iso_3" => "ZAF", "order" => 18],
            ["name" => "Zambia", "iso_2" => "ZM", "iso_3" => "ZMB", "order" => 999],
            ["name" => "Zimbabwe", "iso_2" => "ZW", "iso_3" => "ZWE", "order" => 999],
        ];
        DB::table(self::TABLE_NAME)->insert($countries);
    }

    public function down(): void
    {
        Schema::dropIfExists(config('ctrlc.address.table_name'));
    }
}