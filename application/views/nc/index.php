<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="page-header">
          <h1>新概念英语检测系统</h1>
          <p class="lead">Please input your name and the basic infomations</p>
      </div>
      <form class="form-inline" action="/newconcept/index.php/Newconcept/tests" method="GET">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Yanjiao,Shen">
      </div>
      <div class="form-group form-group-sm">
        <label for="volume">Volumes</label>
        <input type="text" class="form-control" readonly="readonly" id="volume" name="volume" placeholder="Forth" value="Forth">
      </div>
      <div class="form-group form-group-sm">
        <label for="lessons">Lessons</label>
        <input type="text" class="form-control" id="lessons" name="lessons" placeholder="1">
      </div>
      <button type="submit" class="btn btn-success">Start</button>
    </form>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      
    </script>
  </body>
</html>