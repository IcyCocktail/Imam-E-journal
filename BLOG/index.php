<?php
include("path.php")
?>
<?php include(ROOT_PATH . "/app/database/connection.php"); ?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="asset/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&amp;family=Tajawal:wght@200;300;400;500;700;800;900&amp;display=swap" rel="stylesheet";400;500;700;800;900&amp;display=swap" rel="stylesheet">
    <title>كلية حريملاء التطبيقية | مجلة</title>
</head>
<body>
<?php include("app/includes/header.php") ?>

<!--PAGE WRAPPER-->
<div class="page-wrapper">

    <!--POST SLIDER-->
    <div class="post-slider">
        <h1 class="slider-title">منشورات مُختارة</h1>

        <i class="fa-solid fa-chevron-left prev"></i>
        <i class="fa-solid fa-chevron-right next"></i>

        <!--POST WRAPPER-->
        <div class="post-wrapper">
        <?php
            $query = "SELECT `post_id`, `title`, `content`, `author`, `tag_name`, `created_at` FROM `posts`";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("query failed" . mysqli_error());
            } else {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
            <div class="post">
                <div class="post-info">
                    <h4><a href="single.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></h4>
                    <div class="icons">
                    <i class="fa-solid fa-user-pen"></i><span><?php echo $row['author']; ?></span>
                    &nbsp;
                    <i class="fa-regular fa-calendar-days"></i><span><?php echo date("Y-m-d",strtotime($row['created_at'])); ?></span>
                    &nbsp;
                    <i class="fa-solid fa-newspaper"></i><span><?php echo $row['tag_name']; ?></span>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>

        </div>
        <!--POST WRAPPER-->

    </div>
    <!--POST SLIDER-->

<!--CONTENT-->
<div class="content clearfix">

    <!--MAIN CONTENT-->
    <div class="main-content">
        <div class="search">
        <h1 class="recent-post-title" id="recent-posts">آخر ما خُط</h1>
            <form action="search.php" method="post"><i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="search" id="text-input" placeholder="أدخل عنوان المنشور أو اسم الكاتب">
                <button type="submit" name="go">ابحث</button>
            </form>
        </div>
        
        <?php
    if(isset($_GET['fmsg'])){
  echo "<h3>".$_GET['fmsg']."</h3>";
}
?>

        <?php
            $query = "SELECT `post_id`, `title`, `content`, `author`, `tag_name`, `created_at` FROM `posts`";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("query failed" . mysqli_error());
            } else {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
            <div class="post">
                <div class="post-preview">
                    <h4><a href="single.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></h4>
                    <i class="fa-solid fa-user-pen"></i><span><?php echo $row['author']; ?></span>
                    &nbsp;
                    <i class="fa-regular fa-calendar-days"></i><span><?php echo date("Y-m-d",strtotime($row['created_at'])); ?></span>
                    <p class="preview-text"><?php echo mb_strimwidth($row['content'], 0, 150, "..."); ?></p>
                    <button name="readmore"><a href="single.php?post_id=<?php echo $row['post_id']; ?>" class="btn">استكمل القراءة</a></button>
                </div>
            </div>
            
            <?php
                }
            }
            ?>
            
    </div>
    <!--MAIN CONTENT-->

        <div class="trial"><h1>التقويم الدراسي</h1></div>
        <hr>
        <div class="side-bar">
        <div class="mini-trial"><h4>الفصل الدراسي الأول</h4></div>
        
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التحويل بين الكليات والأقسام وإعادة القيد للمنتظمين غير المستجدين</p></div>
            <p class="YY-MM"><span class="day">30</span><br>2023 - 07</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>تسجيل المقررات</p></div>
            <p class="YY-MM"><span class="day">10</span><br>2023 - 08</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التأجيل</p></div>
            <p class="YY-MM"><span class="day">20</span><br>2023 - 08</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>الاعتذار عن الفصل الدراسي، والانسحاب من مقرر أو مقررين</p></div>
            <p class="YY-MM"><span class="day">27</span><br>2023 - 08</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p style="color: #447163;">فعالية اليوم الوطني</p></div>
            <p class="YY-MM"><span class="day" style="color: #447163;">27</span><br>2023 - 09</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>فعالية يوم المعلم</p></div>
            <p class="YY-MM"><span class="day">09</span><br>2023 - 10</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>بداية الاختبارات النهائية للفصل الدراسي الأول</p></div>
            <p class="YY-MM"><span class="day">05</span><br>2023 - 11</p>
            </div>
        </div>

        <hr>
        <div class="mini-trial"><h4>الفصل الدراسي الثاني</h4></div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>تسجيل المقررات</p></div>
            <p class="YY-MM"><span class="day">22</span><br>2023 - 10</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التحويل بين الكليات والأقسام وإعادة القيد للمنتظمين غير المستجدين</p></div>
            <p class="YY-MM"><span class="day">29</span><br>2023 - 10</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التسجيل الإلحاقي</p></div>
            <p class="YY-MM"><span class="day">19</span><br>2023 - 11</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التأجيل</p></div>
            <p class="YY-MM"><span class="day">26</span><br>2023 - 11</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>الاعتذار عن الفصل الدراسي، والانسحاب من مقرر أو مقررين</p></div>
            <p class="YY-MM"><span class="day">03</span><br>2023 - 12</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>بداية الاختبارات النهائية للفصل الدراسي الثاني</p></div>
            <p class="YY-MM"><span class="day">11</span><br>2024 - 02</p>
            </div>
        </div>

        <hr>
        <div class="mini-trial"><h4>الفصل الدراسي الثالث</h4></div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>تسجيل المقررات</p></div>
            <p class="YY-MM"><span class="day">28</span><br>2024 - 01</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التحويل بين الكليات والأقسام وإعادة القيد للمنتظمين غير المستجدين</p></div>
            <p class="YY-MM"><span class="day">04</span><br>2024 - 02</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التسجيل الإلحاقي</p></div>
            <p class="YY-MM"><span class="day">29</span><br>2024 - 02</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التأجيل</p></div>
            <p class="YY-MM"><span class="day">03</span><br>2043 - 03</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>الاعتذار عن الفصل الدراسي، والانسحاب من مقرر أو مقررين</p></div>
            <p class="YY-MM"><span class="day">03</span><br>2024 - 10</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>بداية الاختبارات النهائية للفصل الدراسي الثالث</p></div>
            <p class="YY-MM"><span class="day">29</span><br>2024 - 05</p>
            </div>
        </div>
        <div class="dates">
            <div class="date">
            <div class="Procedure"><p>التحويل الخارجي</p></div>
            <p class="YY-MM"><span class="day">27</span><br>2024 - 06</p>
            </div>
        </div>

        </div>



</div>
<!--CONTENT-->

</div>
<!--PAGE WRAPPER-->

<?php include("app/includes/footer.php") ?>

<a class="to-top" href="#main" title="العودة إلى الأعلى">
    <i class="fa-solid fa-arrow-up"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="asset/js/scripts.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
</html>