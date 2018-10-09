<?php
namespace App\Form;

use App\Document\Map;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ImageUpload extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mapName', TextType::class, array('label'=> '지역 이름'))
            ->add('imageUrl', FileType::class, array('label' => '지도 파일(이미지 파일)'))
            ->add('submit',  SubmitType::class, array('label' => '추가'));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Map::class,
        ));
    }
}