

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <form style="width: 100%" method="POST"  onsubmit="onSave();return false;" id="formCity" >
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Название новости</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control field"
                        id="title"
                        name="title-news"
                        value=""
					>
					<div class="invalid-feedback"></div>
				</div>
				
			</div>
			<div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Текст новости</label>
                <div class="col-md-10">
                    <textarea
                        type="textarea"
                        class="form-control textarea-field field"
                        id="text-news"
                        name="text-news"
                        value=""
					></textarea>
					<div class="invalid-feedback"></div>
                </div>
			</div>
			<div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Автор</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control"
                        id="author-news"
                        name="author-news"
                        value=""
                    >
                </div>
			</div>
			 <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
                <div class="col-md-10">
                    <input
                            type="date"
                            class="form-control"
                            id="date"
                            name="date"
                            value="<?php echo date("Y-m-d");?>"
                    >
                </div>
            </div>
			<div class="form-group row">
                <label for="category" class="col-md-2 col-form-label">Категория</label>
                <div class="col-md-10">
                    <select id="category" class="form-control" name="category-news">
                        <option disabled selected>Выберете категорию из списка..</option>
                        <option value="1">Спорт</option>
                        <option value="2">Культура</option>
						<option value="3">Политика</option>
						<option value="4">Наука</option>
						<option value="3">Финансы</option>
                    </select>
                </div>
			</div>
			<div class="form-group row">
                <label class="col-md-2 col-form-label">Статус</label>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish" id="publish_no" value="0" checked>
                        <label class="form-check-label" for="publish_no">
                            Черновик
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"  type="radio" name="publish" id="publish_yes" value="1">
                        <label class="form-check-label"  for="publish_yes">
                            Опубликовать
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
					<input type="hidden" name="action" value='add'>
                    <input type="submit" value="Добавить новость" class="btn btn-primary">
                </div>
            </div>
        </form>
<style>
    .error{border-color:red;}
	.form-check-input{
		cursor:pointer;
	}
    
    .textarea-field{
        resize:none;
        height:200px !important;
    }
</style>
<script type="text/javascript">
    
    function onSave()
	{
		let formId = '#formCity';
	    $('input, textarea').removeClass('error');
	    $('input, textarea').siblings('.invalid-feedback').html('').hide();
		$.ajax({
			url: 'server.php',
			type: 'POST',
			dataType: 'json',
			data: $(formId).serialize(),
			success: function(responce){
				if(responce.status == 'ok')
				{
					document.location.href='listNews.php';
				}
				else if(responce.status == 'error duble'){
					alert(responce.message);
				} else
				{
					for( key in responce.fields ){
                   		$('.field[name="'+key+'"]').addClass('error');
                   		$('.field[name="'+key+'"]').siblings('.invalid-feedback').html( responce.fields[key].join('<br>')  ).show();
                	}
				}
			}
		})

	}
</script>
    </div>
</div>
</body>
</html>