<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class ImportPosts extends Command
{
    protected $signature = 'import:posts';
    protected $description = 'Import cars from VMG API';

    public function handle()
    {
        $this->info('Starting car import...');
        
        $ids = '944,945,946,947,948,949,950,951,952,953,954,955,956,957,958,959,960,961,962,963,964,965,966,967,968,969,970,971,972,973,974,975,976,977,978,979,980,981,982,983,984,985,986,987,988,989,990,991,992,993,994,995,996,997,998,999,1000,1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,1020,1021,1022,1023,1024,1025,1026,1027,1028,1029,1030,1031,1032,1033,1034,1035,1036,1037,1038,1039,1040,1041,1042,1043,1044,1045,1046,1047,1048,1049,1050,1051,1052,1053,1054,1055,1056,1057,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1075,1076,1077,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1095,1096,1097,1098,1099,1100,1101,1102,1103,1104,1105,1106,1107,1108,1109,1110,1111,1112,1113,1114,1115,1116,1117,1118,1119,1120,1121,1122,1123,1124,1125,1126,1127,1128,1129,1130,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141,1142,1143,1144,1145,1146,1147,1148,1149,1150,1151,1152,1153,1154,1155,1156,1157,1158,1159,1160,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171,1172,1173,1174,1175,1176,1177,1178,1179,1180,1181,1182,1183,1184,1185,1186,1187,1188,1189,1190,1191,1192,1193,1194,1195,1196,1197,1198,1199,1200,1201,1202,1203,1204,1205,1206,1207,1208,1209,1210,1211,1212,1213,1214,1215,1216,1217,1218,1219,1220,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231,1232,1233,1234,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1247,1248,1249,1250,1251,1252,1253,1254,1255,1256,1257,1258,1259,1260,1261,1262,1263,1264,1265,1266,1267,1268,1269,1270,1271,1272,1273,1274,1275,1276,1277,1278,1279,1280,1281,1282,1283,1284,1285,1286,1287,1288,1289,1290,1291,1292,1293,1294,1295,1296,1297,1298,1299,1300,1301,1302,1303,1304,1305,1306,1307,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317,1318,1319,1320,1321,1322,1323,1324,1325,1326,1327,1328,1329,1330,1331,1332,1333,1334,1335,1336,1337,1338,1339,1340,1341,1342,1343,1344,1345,1346,1347,1348,1349,1350,1351,1352,1353,1354,1355,1356,1357,1358,1359,1360,1361,1362,1363,1364,1365,1366,1367,1368,1369,1370,1371,1372,1373,1374,1375,1376,1377,1378,1379,1380,1381,1382,1383,1384,1385,1386,1387,1388,1389,1390,1391,1392,1393,1394,1395,1396,1397,1398,1399,1400,1401,1402,1403,1404,1405,1406,1407,1408,1409,1410,1411,1412,1413,1414,1415,1416,1417,1418,1419,1420,1421,1422,1423,1424,1425,1426,1427,1428,1429,1430,1431,1432,1433,1434,1435,1436,1437,1438,1439,1440,1441,1442,1443,1444,1445,1446,1447,1448,1449,1450,1451,1452,1453,1454,1455,1456,1457,1458,1459,1460,1461,1462,1463,1464,1465,1466,1467,1468,1469,1470,1471,1472,1473,1474,1475,1476,1477,1478,1479,1480,1481,1482,1483,1484,1485,1486,1487,1488,1489,1490,1491,1492,1493,1494,1495,1496,1497,1498,1499,1500,';

        $idsArray = explode(',', $ids);
        $chunks = array_chunk($idsArray, 50); // Process 50 IDs at a time

        foreach ($chunks as $chunk) {
            $baseUrl = "https://www.vmgplay.co.za/api/v3/view_stock_complete_with_data";
            $chunkIds = implode(',', $chunk);
            $url = $baseUrl . '?company_id=in.' . $chunkIds;

        
        
            if (empty($ids) || empty($baseUrl)) {
                $this->error('VMG Cars Import - company_id or base_url is missing.');
                return;
            }
        
        
        
        $response = Http::withOptions([
            'verify' => false,
        ])->get($url);
        
        if ($response->successful()) {
            $results = $response->json();
            
            if (empty($results) || !is_array($results)) {
                $this->error('No car data found or invalid response format.');
                return;
            }
            
            $importCount = 0;
            
            foreach ($results as $result) {
                // Format the data according to your WordPress code
                $companyId = $result['company_id'] ?? '';
                $stockId = $result['stock_id'] ?? '';
                $stockCode = $result['stock_code'] ?? '';
                $make = $result['make'] ?? '';
                $model = $result['series'] ?? '';
                $variant = $result['variant'] ?? '';
                $uniqueCode = $companyId . '_' . $stockCode;
                $vehicleName = $make . ' ' . $model;
                $dateUpdated = $result['date_updated'] ?? '';
                $dateCreated = $result['date_created'] ?? '';
                $dateUpdatedCode = $dateUpdated ? strtotime($dateUpdated) : '';
                $dateCreatedCode = $dateCreated ? strtotime($dateCreated) : '';
                $sellingPrice = $result['selling_price'] ?? '';
                $formattedSellingPrice = $sellingPrice ? number_format($sellingPrice, 0, '.', ' ') : '';
                $installment = $result['premium'] ?? '';
                $formattedInstallment = $installment ? number_format($installment, 0, '.', ' ') : '';
                $year = $result['year'] ?? '';
                $condition = $result['condition'] ?? '';
                $description = $result['description'] ? htmlspecialchars($result['description'], ENT_QUOTES) : '';
                $extras = $result['extras_csv'] ?? '';
                $colour = $result['colour'] ? ucwords($result['colour']) : '';
                $mileage = $result['mileage'] ?? '';
                $formattedMileage = $mileage ? number_format($mileage, 0, '.', ',') : '';
                $bodyType = $result['body_type'] ?? '';
                $fuelType = $result['fuel_type'] ?? '';
                $transmission = $result['transmission'] ?? '';
                $height = $result['height'] ?? '';
                $width = $result['width'] ?? '';
                $length = $result['length'] ?? '';
                $gears = $result['gears'] ?? '';
                $doors = $result['doors'] ?? '';
                $seats = $result['seats'] ?? '';
                $tare = $result['tare'] ?? '';
                $gvm = $result['gvm'] ?? '';
                $cooling = $result['cooling'] ?? '';
                $fuelTankSize = $result['fuel_tank_size'] ?? '';
                $frontTyreSize = $result['front_tyre_size'] ?? '';
                $rearTyreSize = $result['rear_tyre_size'] ?? '';
                $image1 = $result['url1'] ?? '';
                $image2 = $result['url2'] ?? '';
                $image3 = $result['url3'] ?? '';
                $image4 = $result['url4'] ?? '';
                $image5 = $result['url5'] ?? '';
                $image6 = $result['url6'] ?? '';
                $image7 = $result['url7'] ?? '';
                $image8 = $result['url8'] ?? '';
                $image9 = $result['url9'] ?? '';
                $image10 = $result['url10'] ?? '';
                $image11 = $result['url11'] ?? '';
                $image12 = $result['url12'] ?? '';
                $image13 = $result['url13'] ?? '';
                $image14 = $result['url14'] ?? '';
                $image15 = $result['url15'] ?? '';
                $image16 = $result['url16'] ?? '';
                $image17 = $result['url17'] ?? '';
                $image18 = $result['url18'] ?? '';
                $image19 = $result['url19'] ?? '';
                $image20 = $result['url20'] ?? '';
                
                // Format special fields as in your WordPress code
                $formattedCooling = '';
                if ($cooling === "A") {
                    $formattedCooling = "Air";
                } elseif ($cooling === "W") {
                    $formattedCooling = "Water";
                } else {
                    $formattedCooling = "Not Specified";
                }
                
                $formattedTransmission = '';
                if ($transmission === "A") {
                    $formattedTransmission = "Automatic";
                } elseif ($transmission === "M") {
                    $formattedTransmission = "Manual";
                } else {
                    $formattedTransmission = "Not Specified";
                }
                
                $formattedFuelType = '';
                if ($fuelType === "P") {
                    $formattedFuelType = "Petrol";
                } elseif ($fuelType === "D") {
                    $formattedFuelType = "Diesel";
                } elseif ($fuelType === "E") {
                    $formattedFuelType = "Electric";
                } else {
                    $formattedFuelType = "Not Specified";
                }
                
                // Create or update post record
                Post::updateOrCreate(
                    ['stockid' => $stockId],
                    [
                        'companyid' => $companyId,
                        'stockcode' => $stockCode,
                        'mmcode' => $result['mmcode'] ?? '',
                        'make' => $make,
                        'model' => $model,
                        'variant' => $variant,
                        'vin' => $result['vin'] ?? '',
                        'uniquecode' => $uniqueCode,
                        'vehiclename' => $vehicleName,
                        'dateupdated' => $dateUpdated,
                        'datecreated' => $dateCreated,
                        'dateupdatedcode' => $dateUpdatedCode,
                        'datecreatedcode' => $dateCreatedCode,
                        'sellingprice' => $sellingPrice,
                        'formattedsellingprice' => $formattedSellingPrice,
                        'installment' => $installment,
                        'formattedinstallment' => $formattedInstallment,
                        'vyear' => $year,
                        'vcondition' => $condition,
                        'vdescription' => $description,
                        'extras' => $extras,
                        'colour' => $colour,
                        'mileage' => $mileage,
                        'formattedmileage' => $formattedMileage,
                        'bodytype' => $bodyType,
                        'fueltype' => $formattedFuelType,  // Use the formatted value
                        'transmission' => $formattedTransmission,  // Use the formatted value
                        'height' => $height,
                        'width' => $width,
                        'vlength' => $length,
                        'gears' => $gears,
                        'doors' => $doors,
                        'seats' => $seats,
                        'tare' => $tare,
                        'gvm' => $gvm,
                        'cooling' => $formattedCooling,  // Use the formatted value
                        'fueltanksize' => $fuelTankSize,
                        'fronttyresize' => $frontTyreSize,
                        'reartyresize' => $rearTyreSize,
                        'financeurl' => $result['finance_url'] ?? '',
                        'videourl' => $result['video_url'] ?? '',
                        'image1' => $image1,
                        'image2' => $image2,
                        'image3' => $image3,
                        'image4' => $image4,
                        'image5' => $image5,
                        'image6' => $image6,
                        'image7' => $image7,
                        'image8' => $image8,
                        'image9' => $image9,
                        'image10' => $image10,
                        'image11' => $image11,
                        'image12' => $image12,
                        'image13' => $image13,
                        'image14' => $image14,
                        'image15' => $image15,
                        'image16' => $image16,
                        'image17' => $image17,
                        'image18' => $image18,
                        'image19' => $image19,
                        'image20' => $image20,
                    ]
                );
                
                $importCount++;
            
        }
            
            $this->info("Successfully imported {$importCount} cars.");
        } else {
            $this->error('Failed to fetch data from VMG API: ' . $response->status());
        }
    }
}
}