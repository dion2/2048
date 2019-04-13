<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var data_arr = Array(
        Array(2, 0, 0, 0, 0),
        Array(0, 0, 0, 0, 0),
        Array(0, 0, 0, 0, 0),
        Array(0, 0, 0, 0, 0),
        Array(0, 0, 0, 0, 0),
    );

    var chk = 1;

    $(document).ready(function() {

        set_new_values();

        $("#right_btn").click(function() {
            move_right();
            set_new_values();
        });

        $("#left_btn").click(function() {
            move_left();
            set_new_values();
        });

        $("#top_btn").click(function() {
            move_top();
            set_new_values();
        });

        $("#down_btn").click(function() {
            move_down();
            set_new_values();
        });
    });
    $(document).keydown(function(event) {
        // console.log(event.keyCode);
        switch (event.keyCode) {
            case 37:
                // alert('方向键-左');
                var chk = move_left();
                set_new_values(chk);
                break;
            case 38:
                // alert('方向键-上');
                var chk = move_top();
                set_new_values(chk);
                break;
            case 39:
                // alert('方向键-右');
                var chk = move_right();
                set_new_values(chk);
                break;
            case 40:
                // alert('方向键-下');
                var chk = move_down();
                set_new_values(chk);
                break;
        };
        return false;
    });


    function move_right() {
        var chk = 1;
        for (row = 0; row <= 4; row++) {
            for (t = 4; t >= 0; t--) {
                for (i = (t - 1); i >= 0; i--) {
                    if (data_arr[row][t] == data_arr[row][i]) {
                        data_arr[row][t] = data_arr[row][t] + data_arr[row][i];
                        data_arr[row][i] = 0;
                        if (data_arr[row][t] != 0 && chk == 1) {
                            chk = 0;
                        }
                    } else if (data_arr[row][t] == 0) {
                        data_arr[row][t] = data_arr[row][t] + data_arr[row][i];
                        data_arr[row][i] = 0;
                        chk = 0;
                    } else if (data_arr[row][t] != data_arr[row][i] && data_arr[row][i] != 0) {
                        break;
                    }
                }
            }
        }
        return chk;
    }

    function move_left() {
        var chk = 1;
        for (row = 0; row <= 4; row++) {
            for (t = 0; t <= 4; t++) {
                for (i = (t + 1); i <= 4; i++) {
                    if (data_arr[row][t] == data_arr[row][i]) {
                        data_arr[row][t] = data_arr[row][t] + data_arr[row][i];
                        data_arr[row][i] = 0;
                        if (data_arr[row][t] != 0 && chk == 1) {
                            chk = 0;
                        }
                    } else if (data_arr[row][t] == 0) {
                        data_arr[row][t] = data_arr[row][t] + data_arr[row][i];
                        data_arr[row][i] = 0;
                        chk = 0;
                    } else if (data_arr[row][t] != data_arr[row][i] && data_arr[row][i] != 0) {
                        break;
                    }
                }
            }
        }
        return chk;
    }

    function move_top() {
        var chk = 1;
        for (col = 0; col <= 4; col++) {
            for (t = 0; t <= 4; t++) {
                for (i = (t + 1); i <= 4; i++) {

                    if (data_arr[t][col] == data_arr[i][col]) {
                        data_arr[t][col] = data_arr[t][col] + data_arr[i][col];
                        data_arr[i][col] = 0;
                        if (data_arr[t][col] != 0 && chk == 1) {
                            chk = 0;
                        }
                    } else if (data_arr[t][col] == 0) {
                        data_arr[t][col] = data_arr[t][col] + data_arr[i][col];
                        data_arr[i][col] = 0;
                        chk = 0;
                    } else if (data_arr[t][col] != data_arr[i][col] && data_arr[i][col] != 0) {
                        break;
                    }
                }
            }
        }
        return chk;
    }

    function move_down() {
        var chk = 1;
        for (col = 0; col <= 4; col++) {
            for (t = 4; t >= 0; t--) {
                for (i = (t - 1); i >= 0; i--) {
                    if (data_arr[t][col] == data_arr[i][col]) {
                        data_arr[t][col] = data_arr[t][col] + data_arr[i][col];
                        data_arr[i][col] = 0;
                        if (data_arr[t][col] != 0 && chk == 1) {
                            chk = 0;
                        }

                    } else if (data_arr[t][col] == 0) {
                        data_arr[t][col] = data_arr[t][col] + data_arr[i][col];
                        data_arr[i][col] = 0;
                        chk = 0;
                    } else if (data_arr[t][col] != data_arr[i][col] && data_arr[i][col] != 0) {
                        break;
                    }
                }
            }

        }
        return chk;
    }



    function create_rand_values() {
        var new_values = 0;
        new_value = (Math.floor(Math.random() * 2) + 1) * 2;
        return new_value;
    }

    function rand_set_values() {
        var new_values = create_rand_values();
        var new_array = Array();
        $.each(data_arr, function(key, value) {
            // console.log(value);
            if (value == 0) {
                new_array.push(key);
            }
        });


        var new_row = (Math.floor(Math.random() * 5));
        var new_col = (Math.floor(Math.random() * 5));
        if (data_arr[new_row][new_col] == 0) {
            data_arr[new_row][new_col] = new_values;
        } else {
            rand_set_values();
        }

    }

    function set_new_values(chk) {
        console.log(chk);
        if (chk == 0) {
            rand_set_values();
        }


        $("#col_1_1").html(data_arr[0][0]);
        $("#col_1_2").html(data_arr[0][1]);
        $("#col_1_3").html(data_arr[0][2]);
        $("#col_1_4").html(data_arr[0][3]);
        $("#col_1_5").html(data_arr[0][4]);

        $("#col_2_1").html(data_arr[1][0]);
        $("#col_2_2").html(data_arr[1][1]);
        $("#col_2_3").html(data_arr[1][2]);
        $("#col_2_4").html(data_arr[1][3]);
        $("#col_2_5").html(data_arr[1][4]);

        $("#col_3_1").html(data_arr[2][0]);
        $("#col_3_2").html(data_arr[2][1]);
        $("#col_3_3").html(data_arr[2][2]);
        $("#col_3_4").html(data_arr[2][3]);
        $("#col_3_5").html(data_arr[2][4]);

        $("#col_4_1").html(data_arr[3][0]);
        $("#col_4_2").html(data_arr[3][1]);
        $("#col_4_3").html(data_arr[3][2]);
        $("#col_4_4").html(data_arr[3][3]);
        $("#col_4_5").html(data_arr[3][4]);

        $("#col_5_1").html(data_arr[4][0]);
        $("#col_5_2").html(data_arr[4][1]);
        $("#col_5_3").html(data_arr[4][2]);
        $("#col_5_4").html(data_arr[4][3]);
        $("#col_5_5").html(data_arr[4][4]);

    }
</script>
<style>
    .Square {
        height: 150px;
        width: 150px;
        text-align: center;
        size: 15px;
        font-size: 140px;
        border: 1px solid #000000;
        border-radius: 10px;
    }
</style>

<body>
    <table border="0">
        <tr>
            <Td>
                <div class="Square" id="col_1_1"> 1</div>
            </Td>
            <Td>
                <div class="Square" id="col_1_2"> 2</div>
            </Td>
            <Td>
                <div class="Square" id="col_1_3"> 3</div>
            </Td>
            <Td>
                <div class="Square" id="col_1_4"> 4</div>
            </Td>
            <Td>
                <div class="Square" id="col_1_5"> 5</div>
            </Td>
        </tr>
        <tr>
            <Td>
                <div class="Square" id="col_2_1"> 1</div>
            </Td>
            <Td>
                <div class="Square" id="col_2_2"> 2</div>
            </Td>
            <Td>
                <div class="Square" id="col_2_3"> 3</div>
            </Td>
            <Td>
                <div class="Square" id="col_2_4"> 4</div>
            </Td>
            <Td>
                <div class="Square" id="col_2_5"> 5</div>
            </Td>
        </tr>
        <tr>
            <Td>
                <div class="Square" id="col_3_1"> 1</div>
            </Td>
            <Td>
                <div class="Square" id="col_3_2"> 2</div>
            </Td>
            <Td>
                <div class="Square" id="col_3_3"> 3</div>
            </Td>
            <Td>
                <div class="Square" id="col_3_4"> 4</div>
            </Td>
            <Td>
                <div class="Square" id="col_3_5"> 5</div>
            </Td>
        </tr>
        <tr>
            <Td>
                <div class="Square" id="col_4_1"> 1</div>
            </Td>
            <Td>
                <div class="Square" id="col_4_2"> 2</div>
            </Td>
            <Td>
                <div class="Square" id="col_4_3"> 3</div>
            </Td>
            <Td>
                <div class="Square" id="col_4_4"> 4</div>
            </Td>
            <Td>
                <div class="Square" id="col_4_5"> 5</div>
            </Td>
        </tr>
        <tr>
            <Td>
                <div class="Square" id="col_5_1"> 1</div>
            </Td>
            <Td>
                <div class="Square" id="col_5_2"> 2</div>
            </Td>
            <Td>
                <div class="Square" id="col_5_3"> 3</div>
            </Td>
            <Td>
                <div class="Square" id="col_5_4"> 4</div>
            </Td>
            <Td>
                <div class="Square" id="col_5_5"> 5</div>
            </Td>
        </tr>
    </table>

    <input type="button" id="right_btn" value="right_btn">
    <input type="button" id="left_btn" value="left_btn">
    <input type="button" id="top_btn" value="top_btn">
    <input type="button" id="down_btn" value="down_btn">
</body>

</html>