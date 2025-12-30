<?php //html, php, css 포함한 가치있는 것 제작.

    $dir = './image/' ; //경로 끝에 슬래쉬 반드시 붙이기 !!
    $today = date('YmdHis');
    $userid = 'hong';
    
    $file_info = pathinfo($_FILES['image']['name']);
    $file_type = $file_info['extension'];

    $file_name = $today.$userid.'.'.$file_type;
    $imagepath = $dir.$file_name;

    move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);
    $f_size = $_FILES['image']['size'];
    $result_size = number_format($f_size);

    echo "첨부파일: $file_name ($result_size bytes)<br>";
    echo "<img src = '$imagepath'>"; //<img src =  

    echo("감사합니다!!")

    
    // $_FILES['userfile']['name'] //업로드 파일의 이름에 접근할 때
    // $_FILES['userfile']['tmp_name'] //업로드된 파일에 접근할 때
    // $_FILES['userfile']['size'] //업로드된 파일의 크기에 접근할 때
    // $_FILES['userfile']['type'] // 업로드된 파일의 유형에 접근할 때
?>