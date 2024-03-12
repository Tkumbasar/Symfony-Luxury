<?php

namespace App\Controller\Admin;

use App\Entity\Compagny;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompagnyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compagny::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('societyName'),
            TextField::new('activityType'),
            TextField::new('contactName'),
            TextField::new('positionHeld'),
            TextField::new('contactNumber'),
            TextField::new('contactEmail'),
            TextField::new('notes'),
            AssociationField::new('createdAt'),
            AssociationField::new('jobs'),
            
        ];
    }
    
}
