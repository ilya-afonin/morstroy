<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// get images for prop
foreach($arResult["ITEMS"] as $key=>$arItem){
    switch($arItem['CODE']){
        case 'TYPE':
            // чтоб не кастомить компонент получаем сортировку
            // создаем объект Query. В качестве параметра он принимает объект сущности, относительно которой мы строим запрос
            $query = new \Bitrix\Main\Entity\Query(Bitrix\Iblock\ElementTable::getEntity());
            $query
                ->setSelect(array("ID", "PREVIEW_PICTURE","SORT"))
                ->setFilter(array("IBLOCK_ID" => '17',"ACTIVE" => 'Y'))
                ->setOrder(array("ID" => "ASC"))
                ->setLimit(50);
            $ob = $query->exec();
            while($res = $ob->fetch())
            {
                // resize
                $arGetFields[$res['ID']] = $res['PREVIEW_PICTURE'];

                // for resort
                $arPowerSort[$res['ID']] = $res['SORT'];
            }

            // resize
            foreach($arItem["VALUES"] as $val => $ar){
                foreach($arGetFields as $key_el_id=>$imageID) {
                    if($val == $key_el_id){
//                    $arResult["ITEMS"][$key]["VALUES"][$val]['RESIZE'] = CFile::ResizeImageGet($imageID, array('width'=>225, 'height'=>225), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
                        $arItem['VALUES'][$val]['RESIZE'] = CFile::ResizeImageGet($imageID, array('width'=>225, 'height'=>225), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
                    }
                }
            }

            $arNewValues = array();
            foreach($arItem["VALUES"] as $val => $ar){
                // for resort
                foreach($arPowerSort as $key_el_id=>$arItemValSort){
                    if($val == $key_el_id){
                        $ar['SORT'] = $arItemValSort;
                    }
                }
                $arNewValues[$ar['SORT']] = $ar;
            }

            // sort values
            ksort($arNewValues);
            $arItem['VALUES'] = $arNewValues;

            $arNewItems[$key] = $arItem;

            break;
        case 'STYLE':
            // чтоб не кастомить компонент получаем сортировку
            // создаем объект Query. В качестве параметра он принимает объект сущности, относительно которой мы строим запрос
            $query = new \Bitrix\Main\Entity\Query(Bitrix\Iblock\ElementTable::getEntity());
            $query
                ->setSelect(array("ID", "SORT"))
                ->setFilter(array("IBLOCK_ID" => '18',"ACTIVE" => 'Y'))
                ->setOrder(array("ID" => "ASC"))
                ->setLimit(50);
            $ob = $query->exec();
            while($res = $ob->fetch())
            {

                // for resort
                $arPowerSort[$res['ID']] = $res['SORT'];
            }

            $arNewValues = array();
            foreach($arItem["VALUES"] as $val => $ar){
                // for resort
                foreach($arPowerSort as $key_el_id=>$arItemValSort){
                    if($val == $key_el_id){
                        $ar['SORT'] = $arItemValSort;
                    }
                }
                $arNewValues[$ar['SORT']] = $ar;
            }

            // sort values

            ksort($arNewValues);
            $arItem['VALUES'] = $arNewValues;

            $arNewItems[$key] = $arItem;

            break;
        case 'SQUARE_F':
            // чтоб не кастомить компонент получаем сортировку
            // создаем объект Query. В качестве параметра он принимает объект сущности, относительно которой мы строим запрос
            $query = new \Bitrix\Main\Entity\Query(Bitrix\Iblock\ElementTable::getEntity());
            $query
                ->setSelect(array("ID", "SORT"))
                ->setFilter(array("IBLOCK_ID" => '19',"ACTIVE" => 'Y'))
                ->setOrder(array("ID" => "ASC"))
                ->setLimit(50);
            $ob = $query->exec();
            while($res = $ob->fetch())
            {

                // for resort
                $arPowerSort[$res['ID']] = $res['SORT'];
            }

            $arNewValues = array();
            foreach($arItem["VALUES"] as $val => $ar){
                // for resort
                foreach($arPowerSort as $key_el_id=>$arItemValSort){
                    if($val == $key_el_id){
                        $ar['SORT'] = $arItemValSort;
                    }
                }
                $arNewValues[$ar['SORT']] = $ar;
            }

            // sort values
            ksort($arNewValues);
            $arItem['VALUES'] = $arNewValues;

            $arNewItems[$key] = $arItem;

            break;
        case 'STAGE':
            // чтоб не кастомить компонент получаем сортировку
            // создаем объект Query. В качестве параметра он принимает объект сущности, относительно которой мы строим запрос
            $query = new \Bitrix\Main\Entity\Query(Bitrix\Iblock\ElementTable::getEntity());
            $query
                ->setSelect(array("ID", "SORT"))
                ->setFilter(array("IBLOCK_ID" => '20',"ACTIVE" => 'Y'))
                ->setOrder(array("ID" => "ASC"))
                ->setLimit(50);
            $ob = $query->exec();
            while($res = $ob->fetch())
            {

                // for resort
                $arPowerSort[$res['ID']] = $res['SORT'];
            }

            $arNewValues = array();
            foreach($arItem["VALUES"] as $val => $ar){
                // for resort
                foreach($arPowerSort as $key_el_id=>$arItemValSort){
                    if($val == $key_el_id){
                        $ar['SORT'] = $arItemValSort;
                    }
                }
                $arNewValues[$ar['SORT']] = $ar;
            }

            // sort values
            ksort($arNewValues);
            $arItem['VALUES'] = $arNewValues;

            $arNewItems[$key] = $arItem;

            break;
        default:
            $arNewItems[$key] = $arItem;

            break;
    }
}
$arResult["ITEMS"] = $arNewItems;