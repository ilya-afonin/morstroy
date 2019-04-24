<?

include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

define('PAGE_CLASS', 'error');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>

  <section>
    <div class="container error__content">
      <h1 class="error__title title_section">Здесь ничего нет</h1>
      <p class="error__desc">Страницы с таким адресом не существует или она была перемещена.</p>
      <a class="button" href="/" title="Перейти на главную страницу">Домой →</a>
    </div>
  </section>

  <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/error_img.php", Array(), Array("MODE" => "html"))?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>