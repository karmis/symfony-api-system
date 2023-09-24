<?php

namespace App\Form\Type;

use App\Entity\Country;
use App\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BuyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('countries', EntityType::class, [
//                'class' => Country::class,
//                'mapped' => false,
//                'choice_label' => 'name',
//            ])
            ->add('product', EntityType::class, [
                'class' => Product::class,
                'mapped' => false,
                'query_builder' => function (EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label' => function (Product $product, $key, $index) {
                    return $product->getName() . ' ' . $product->getPrice();
                },
            ])
            ->add('couponCode', TextType::class, [
                'mapped' => false,
                'required' => false
            ])
            ->add('taxNumber', TextType::class, [
                'mapped' => false,
                'required' => true
            ])
            ->add('buy', SubmitType::class);
    }
}