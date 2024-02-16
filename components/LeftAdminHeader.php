<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <div class="leftPanel">
        <div class="logo_img">
            <img src="https://res.cloudinary.com/dnxv21hr0/image/upload/v1681014809/ClientImages/logo_l0f3ug.png" layout="fill" alt="logo " />
        </div>


        <!-- sub links -->
        <div class="menu_Links">
            <li id="clicked">
                <div class="styles">
                    <div class="icon">
                        {item.icon}
                    </div>

                    <span class="title">Home</span>

                    <div class="arrows">

                        <div class="top"> {item.close}</div>
                        <!-- <div class="top"> {item.close}</div> :<div class={Styles.top}> {item.open}</div>        -->
                    </div>
                </div>

                <ul id="shows">
                    <li><a href="">add</a></li>


                </ul>

            </li>
        </div>
    </div>
</body>

</html>