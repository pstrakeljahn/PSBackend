<?php

namespace PS\Source\Endpoints;

use PS\Core\Api\ApiExtender;
use PS\Core\Database\Criteria;
use PS\Core\RequestHandler\Response;
use PS\Source\Classes\Menu;
use PS\Source\Classes\MenuCategory;

class GetMenu extends ApiExtender
{

    public function define()
    {
        $this->setAllowedMethodes(['GET']);
        $this->setNeedsAuth(false);
    }

    public function get()
    {
        $returnArray = array();
        $categories = MenuCategory::getInstance()->select();
        usort($categories, fn ($a, $b) => $a->getPosition() <=> $b->getPosition());

        foreach ($categories as $category) {
            $returnArray[] = [
                'title' => $category->getTitle(),
                'items' => $this->getMenuByCatId($category->getID())
            ];
        }
        $this->setResponse($returnArray, null, Response::STATUS_CODE_OK);
    }

    private function getMenuByCatId($id): array
    {
        $returnArray = array();
        $arrMenu = Menu::getInstance()->add(Menu::MENUCATEGORYID, $id)->select();
        usort($arrMenu, fn ($a, $b) => $a->getPosition() <=> $b->getPosition());
        foreach ($arrMenu as $menu) {
            if ($menu->getHidden()) continue;
            $returnArray[] = [
                'name' => $menu->getName(),
                'price' => $menu->getPrice(),
                'description' => $menu->getDescription(),
                'size' => $menu->getSize()
            ];
        }

        return $returnArray;
    }
}
