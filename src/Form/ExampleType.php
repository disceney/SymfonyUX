<?php

namespace App\Form;

use App\Traits\DataTrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class ExampleType extends AbstractType
{
	public function buildForm (FormBuilderInterface $builder, array $options) : void
	{
		$builder->add("name", TextType::class, [
			"label" => "Name",
			"constraints" => [
				new NotBlank(),
				new Length([
					"min" => 6,
					"max" => 124,
				])
			]
		]);

		$builder->add("choices_1", ChoiceType::class, [
			"label" => "Choices 1",
			"choices" => DataTrait::getData(),
			"constraints" => [
				new NotBlank(),
				new Choice([
					"choices" => DataTrait::getData(),
				])
			],
			"attr" => [
				"data-live-id" => "form-choices-1"
			],
			"empty_data" => "Element 0"
		]);

		$builder->add("choices_2", ChoiceType::class, [
			"label" => "Choices 2",
			"choices" => DataTrait::getData(),
			"constraints" => [
				new NotBlank(),
				new Choice([
					"choices" => DataTrait::getData(),
				])
			],
			"attr" => [
				"data-live-id" => "form-choices-2"
			],
			"empty_data" => "Element 0"
		]);

		$builder->add("date", DateType::class, [
			"widget" => "single_text",
			"label" => "Date",
			"constraints" => [
				new NotBlank(),
				new Range([
					"max" => "-13 years"
				])
			],
			"attr" => [
				"data-live-id" => "form-date-1"
			]
		]);
	}
}
