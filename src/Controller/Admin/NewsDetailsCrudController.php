<?php

namespace App\Controller\Admin;

use App\Entity\NewsDetails;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NewsDetailsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsDetails::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('shortDescription'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('updatedAt'),
            AssociationField::new('userId'),
            
        ];
    }
    
}
