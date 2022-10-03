<?php

namespace App\Controller\Admin;

use App\Entity\Roles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class RolesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Roles::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        //echo 'tamo';



        return [
            //IdField::new('id'),
            //TextField::new('roleName'),
            //TextEditorField::new('description'),
            //AssociationField::new('usersId'),
            //'ABCD',
        ];
    }
    
}
