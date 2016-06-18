<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>newconcept testing</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <style>
    .title{text-align:center }
    .body{font-size: 20px}
    .blank{
     border:solid #000;
     border-width:0 0 1px 0;
     width:72px;
     outline:none;
     text-align: center;
     }
    .success{
      color:green;
    }
    .error{
      color:red;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="page-header">
          <h1>新概念英语检测系统</h1>
          <h2><span class="label label-default label-lg">Name:<?php echo $name;?>&nbsp;&nbsp;&nbsp;&nbsp;Time assumed:<i id='times'>0</i>s</span></h2>
      </div>

      <form>
        <h3 class="title"><?php echo $title;?></h3>
        
        <p class="body"><?php echo $content;?></p>
      <button id='aw' type="button" class="btn btn-success">答案</button>
      <button type="reset" class="btn btn-danger" onclick="refresh()">重做</button>
      <button type="button" class="btn btn-info" href="">选课</button>
      <button type="button" class="btn btn-warning" onclick="fresh()">刷新</button>
      </form>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      refresh();
      var inter;
      function refresh(){
        var time = 0;
        $('input').each(function(){
              $(this).val('');
              $(this).removeClass('success');
              $(this).removeClass('error');
          });
        inter = window.setInterval(function(){
          time++;
          if(time < 60)
            $('#times').text(time);
          else{
            var min = Math.floor(time / 60);
            var sec = time % 60;
            $('#times').text(min+'min'+sec);
          }
        }, 1000);
      }
      function fresh(){
        window.location.href = window.location.href;
      }
      $('#aw').click(function(){
          var json = eval('<?php echo $res;?>');
          var i = 0;
          window.clearInterval(inter);
          $('input').each(function(){
              if($(this).val() == json[i])
                $(this).addClass('success');
              else
                $(this).addClass('error');
              $(this).val(json[i]);
              i++;
          });
      });
    </script>
  </body>
</html>