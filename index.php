<?php
    $conn=mysqli_connect("sql208.infinityfree.com","if0_36889227","Chandu07072005","if0_36889227_eapcet_cutoff_2023");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Cutoff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="pbc.css">
</head>
<body>
    <div class="main-div">
        <h1 id="h1" class="text-center mt-5">Get Best Colleges based on your EAPCET Rank</h1>
        <div class="form">
            <form action="" method="POST">
                <label class="h4 mt-3">Enter your Rank :</label>
                <input type="text" placeholder="Your rank" class="inp1 px-3" name="rank" required><br>

                <label class="h4 mt-3">Select your Branch :</label>
                <select name="branch" id="branch" required>
                    <option value="" disabled selected>Select branch</option>
                    <option value="CSE">CSE</option>
                    <option value="CSM">CSM</option>
                    <option value="CSD">CSD</option>
                    <option value="INF">INF</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="MEC">MECH</option>
                    <option value="CIV">CIVIL</option>
                </select>
                <br>

                <label class="h4 mt-3">Select your category :</label>
                <select name="caste" id="caste" required>
                    <option value="" disabled selected>Select category</option>
                    <option value="OC_BOYS">OC_BOYS</option>
                    <option value="OC_GIRLS">OC_GIRLS</option>
                    <option value="SC_BOYS">SC_BOYS</option>
                    <option value="SC_GIRLS">SC_GIRLS</option>
                    <option value="BCA_BOYS">BCA_BOYS</option>
                    <option value="BCA_GIRLS">BCA_GIRLS</option>
                    <option value="BCB_BOYS">BCB_BOYS</option>
                    <option value="BCB_GIRLS">BCB_GIRLS</option>
                    <option value="BCC_BOYS">BCC_BOYS</option>
                    <option value="BCC_GIRLS">BCC_GIRLS</option>
                    <option value="BCD_BOYS">BCD_BOYS</option>
                    <option value="BCD_GIRLS">BCD_GIRLS</option>
                    <option value="BCE_BOYS">BCE_BOYS</option>
                    <option value="BCE_GIRLS">BCE_GIRLS</option>
                    <option value="OC_EWS_BOYS">OC_EWS_BOYS</option>
                    <option value="OC_EWS_GIRLS">OC_EWS_GIRLS</option>
                </select>
                <br>

                <input type="submit" name="submit" value="submit" class="mt-3 bg-success text-white bt">
            </form>
        </div>
        <div class="result">
            <h2 class="mb-5 text-center clg h1">Colleges</h2>
            <div class="text-center" id="colleges">
            <table >
                <tr class="h5">
                    <th>SNO</th>
                    <th id="code">Inst-Code</th>
                    <th>Inst-Name</th>
                    <th>Place</th>
                    <th>Branch</th>
                    <th>Type</th>
                    <th>Dist</th>
                    <th>Estd</th>
                    <th>A_reg</th>
                    <th>COED</th>
                    <th>Caste</th>
                    <th>Cutoff_rank</th>
                </tr>
                <?php
                if (isset($_POST['submit'])) {
                    $rank = intval($_POST['rank']);
                    $branch = $_POST['branch'];
                    $caste = $_POST['caste'];
                    $rank=$rank+5000;

                    // Ensure the query checks the correct columns based on the provided data structure
                    $query = "SELECT * FROM `testnew` WHERE `BRANCH_CODE`='$branch' AND `$caste`<'$rank' AND `$caste` > 0 ORDER BY `$caste`";
                    $data = mysqli_query($conn, $query);
                    $result = mysqli_num_rows($data);
                    $num=0;

                    if ($result > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                            $num=$num+1;
                            ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $row['INSTCODE']; ?></td>
                                <td><?php echo $row['NAME OF THE INSTITUTION']; ?></td>
                                <td><?php echo $row['PLACE']; ?></td>
                                <td><?php echo $row['BRANCH_CODE']; ?></td>
                                <td><?php echo $row['TYPE']; ?></td>
                                <td><?php echo $row['DIST']; ?></td>
                                <td><?php echo $row['ESTD']; ?></td>
                                <td><?php echo $row['A_REG']; ?></td>
                                <td><?php echo $row['COED']; ?></td>
                                <td><?php echo $caste; ?></td>
                                <td><?php echo $row[$caste]; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No Records Found</td></tr>";
                    }
                }
                ?>
            </table>
            </div>
        </div>
        <h5 class="text-center m-5 text-white">Developed by <br> G Chandrasekhar</h5>
    </div>
</body>
</html>