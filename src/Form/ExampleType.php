<?php

namespace App\Form;

use App\Traits\DataTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ExampleType extends AbstractType
{
	public function buildForm (FormBuilderInterface $builder, array $options) : void
	{
		$builder->add("name", TextType::class, [
			"label" => "Name",
			"constraints" => [
				new Length([
					"min" => 6,
					"max" => 124,
				])
			]
		]);


		$builder->add("choices", ChoiceType::class, [
			"label" => "Choices",
			"choices" => DataTrait::getData(),
			"constraints" => [
				new NotBlank(),
				new Choice([
					"choices" => DataTrait::getData(),
				])
			]
		]);
	}
}
