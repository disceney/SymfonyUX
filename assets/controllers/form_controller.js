import { Controller } from "@hotwired/stimulus";
import Choices from "choices.js";
import $ from "jquery";

export default class extends Controller {
	connect () {
		this.initSelectInput();
	}
	
	initSelectInput () {
		let selectInput = $("form select");
		
		if (selectInput.length > 0) {
			selectInput.each(function () {
				new Choices(this, {
					allowHTML: true
				});
			});
		}
	}
}
