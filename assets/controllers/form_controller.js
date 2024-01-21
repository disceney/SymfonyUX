import { Controller } from "@hotwired/stimulus";
import { getComponent } from "@symfony/ux-live-component";
import Choices from "choices.js";
import flatpickr from "flatpickr";
import $ from "jquery";

export default class extends Controller {
	async initialize () {
		this.component = await getComponent(this.element);
		
		this.component.on("render:finished", (component) => {
			this.initPluginInput();
		});
	}
	
	connect () {
		this.initPluginInput();
	}
	
	initPluginInput () {
		let selectInput = $("form select");
		
		if (selectInput.length > 0) {
			selectInput.each(function () {
				if ($(this).hasClass("choices__input") === false) {
					new Choices(this, {
						allowHTML: true
					});
				}
			});
		}
		
		let dateInput = $("form input[type='date']");
		
		if (dateInput.length > 0) {
			dateInput.each(function () {
				if ($(this).hasClass("flatpickr-input") === false) {
					flatpickr(this);
				}
			});
		}
	}
}
