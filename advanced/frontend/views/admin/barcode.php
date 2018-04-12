
<!DOCTYPE html>
<html>
    <head>
        <style>
            table{
                margin-top: 70px;
            }
            h1{
                margin-top: 30px;
                text-align: center;
            }
        </style>
        <script>
            $(document).ready(function () {


                var determiner_next = false;
                var determiner_prev = false;
                //console.log($("hi"));
                size = $("tbody tr:lt(10)").size();
                $("tbody tr").hide();



                function goNext(id) {

                    $("tbody tr").hide();
                    $("tbody tr").slice(10*(id-1),10*id).show();

                }

               

                $(".next").on("click",function () {

                    id = $('.next').attr('id');
                    new_id = parseInt(id) + 1;

                    goNext(new_id);

                    $('.next').attr('id',new_id);

                    determiner_next = true;
                    determiner_prev = false;

                });


                $(".prev").on("click",function () {

                    id = $('.next').attr('id');
                        if(determiner_next === true){
                            back_id = parseInt(id) - 1;
                        }
                        else{
                            back_id = parseInt(id) - 1;
                        }
                    goNext(back_id);

                    $('.next').attr('id',back_id);

                    determiner_prev = true;
                    determiner_next = false;

                });

            })

        </script>
    </head>


    <body>


        <div class="container">


            <h1> Users and Barcodes</h1>


            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">username</th>
                    <th scope="col">barcode</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 0 ; foreach ($result as $res){ ?>
                    <tr>
                        <th scope="row"><?php $count = $count + 1 ; echo($count); ?></th>
                        <td><?php echo($res['first_name']); ?></td>
                        <td><?php echo($res['last_name']); ?></td>
                        <td><?php echo($res['username']); ?></td>
                        <td><?php echo($res['barcode_index']); ?></td>
                        <td><a href="">Link</a></td>
                    </tr>
                <?php } ?>


                </tbody>
            </table>

            <a class="btn btn-primary prev" href="#" role="button">Prev</a>
            <a class="btn btn-primary next" id="1" href="#" style="margin-left: 90%" role="button">Next</a>



        </div>

    </body>
</html>