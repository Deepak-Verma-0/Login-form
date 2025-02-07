<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .modal{
            position: fixed;
            /* z-index:5; */
            padding: 100px;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(51, 50, 50);
            background-color: rgba(0,0,0,0.4);
            display: none;
        }
        .content{
            display: flex;
            /* border: 2px solid black; */
            width: 500px;
            height: 50px;
            background-color: #fefefe;
        }
        p{
            position: relative;
            top: -16px;
            left: 350px;
            cursor: pointer;
            color: #aaaaaa;
        }
    </style>
</head>
<body>
    <button id="btn">Button</button>
    
<div class="modal" id="mymodal">
    <div class="content">
        <span>Lorem, ipsum dolor.</span>
        <p class="close">X</p>
    </div>
</div>

<h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi excepturi accusamus error culpa, incidunt saepe, dignissimos esse eligendi velit, quidem dolores vitae. Corporis eligendi modi beatae iusto. Veritatis quos molestiae dolor, doloribus adipisci eius quam? Distinctio, neque dolore! Cumque molestias ipsam debitis tenetur perferendis voluptates praesentium voluptas assumenda ipsa fugiat! Quam, animi dolore quasi esse sed ullam molestiae voluptate labore!</h1><h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi excepturi accusamus error culpa, incidunt saepe, dignissimos esse eligendi velit, quidem dolores vitae. Corporis eligendi modi beatae iusto. Veritatis quos molestiae dolor, doloribus adipisci eius quam? Distinctio, neque dolore! Cumque molestias ipsam debitis tenetur perferendis voluptates praesentium voluptas assumenda ipsa fugiat! Quam, animi dolore quasi esse sed ullam molestiae voluptate labore!</h1>
<script>
    var modal=document.getElementById("mymodal");
    var btn=document.getElementById("btn");
    var p=document.getElementsByClassName("close")[0];

    btn.onclick=function(){
        modal.style.display="block";
    }
    p.onclick=function(){
        modal.style.display="none";
    }
    window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>