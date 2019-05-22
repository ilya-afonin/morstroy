<?php
/*
 * этот файл перезаписывается при обновлениях
 * используйте его в качестве примера
 */

$settings = array(
    'title' => 'О компании',

    //Разрешить изменение структуры материала, перекрывает настройку "Отключить добавление блоков"
//    'enable_change' => true,

    //Разрешить изменение числа колонок в сетке, работает если настройка enable_change включена
//    'enable_change_columns' => false,

    //Доступные классы колонок для сеток
    'layout_classes' => array(
        'type1' => array(
            array('h1_text_row_left', 'h2_row_blue', 'my_pic_text', 'h3_text_row_left', 'h2_text_row_left_gallery', 'h2_text_row_left_content')
        ),

//        'type2' => array(
//            array()
//        ),

//        'type3' => array(
//            array('col-md-3', 'col-md-4', 'col-md-6', 'col-md-8', 'col-md-9', 'col-md-12'),
//        ),
//        'type4' => array(
//            array('col-md-3', 'col-md-4', 'col-md-6', 'col-md-8', 'col-md-9', 'col-md-12'),
//        ),
    ),

    //Классы колонок для сеток по умолчанию
//    'layout_defaults' => array(
//        'type1' => '',
//        'type2' => 'col-md-6',
//        'type3' => 'col-md-4',
//        'type4' => 'col-md-3',
//    ),

    //Названия классов для колонок
    'layout_titles' => array(
//        'col-md-12' => '100%',
//        'col-md-9' => '75%',
//        'col-md-8' => '66.66%',
//        'col-md-6' => '50%',
//        'col-md-4' => '33.33%',
//        'col-md-3' => '25%',
          'h1_text_row_left' => 'Заголовок + текст с серой чертой слева(о компании)',
          'h2_row_blue' => 'Заголовок с голубой чертой снизу(о компании)',
          'my_pic_text' => 'Картинка слева + Заголовок с описанием(о компании)',
          'h3_text_row_left' => 'Заголовок H3 + текст с серой чертой слева(о компании)',
          'h2_text_row_left_gallery' => 'Заголовок H2 + текст с серой чертой + галерея с описание(о компании)',
          'h2_text_row_left_content' => 'Заголовок H2 + текст с серой чертой + список(о компании)',
//          'file_link' => 'Ссылка на файл',
//          'my_table' => 'Таблица',
//          'my_video' => 'Видео youtube с описанием',
//          'my_3_items_in_row' => 'Блок с 3 картинками и описанием',
//          'my_gallery' => 'Галерея с описанием',
    ),

    //Настройки блоков
    'block_settings' => array(
//        'text' => array(
//            'param1' => array(
//                'type' => 'select',
//                'value' => array(
//                    'style1' => 'Цитата',
//                    'style2' => 'Сноска',
//                )
//            ),
//
//            'csslist' => array(
//                'type' => 'hidden',
//                'value' => array(
//                    'sp-text-1' => 'Стиль 1',
//                    'sp-text-2' => 'Стиль 2',
//                    'sp-text-3' => 'Стиль 3',
//                )
//            ),
//        ),

//        'image' => array(
//            'param1' => array(
//                'type' => 'select',
//                'value' => array(
//                    'style1' => 'Стиль 1',
//                    'style2' => 'Стиль 2',
//                    'style3' => 'Стиль 3',
//                )
//            ),
//        ),

    ),

    //Разрешить добавление указанных блоков
    'block_enabled' => array(
          'htag',
//          'text',
          //'gallery',

          'layout_1',
//          'layout_2',
//          'image',
          'text',
          //'files',
//          'table',
//          'video',
//          'complex_image_text',
//          'my_gallery',
          'pack_afef8290f5ca0cab00fdb7d84ea965b2', // Заголовок + текст с левой чертой
//          'pack_262058c92b68e85ecb2b443c02cdce81', // Заголовок с голубой чертой снизу + картинка с описанием
//          'pack_ad2a28974a66c8ea5b229a22f1fdba68', // Ссылка на файл
//          'pack_67a7b9c4f26d84e14af508342a5bb37f', // Видео с описанием
//          'pack_b0cd49c979ce4a6ca3b995594fcf2591', // Блок с 3 картинками и описанием
//          'pack_b32c9b3f3109e0e3e2318c1940a291c2', // Галерея с описанием
    ),


    //Разрешить добавление указанных сеток
//    'layout_enabled' => array(
        'layout_1',
//        'layout_2',
//        'layout_3',
//        'layout_4',
//    ),



);