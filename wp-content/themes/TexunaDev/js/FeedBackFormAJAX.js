///////////////////////////////////////////////////////////////////////////////////////////////////////
// © 2015 Sergey Didkovsky — didkovsky.dev@gmail.com //////////////////////////////////////////////////
// Version 1.0.0                                     //////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

var Config = {
	DOM: {
		feedBackFormAJAX:      ".wpcf7-form invalid",           //id формы. Указывать полный селектор!
		submitLink:            ".submit",                     //Селектор элемента Sudmit.
		nessFields:            ".wpcf7-validates-as-required",                  //Класс полей обязательных к заполнению.
		emailField:            "your-email",                       //Name поля email. Без селектора.
		phoneField:            "your-tel",                       //Name поля phone. Без селектора.
		notification:          ".notyfication",               //Класс контейнера уведомлений.
	},

	AJAX: {
		ajaxUrl:               "/ajax",                       //AJAX URL.
		method:                "POST",                        //Метод подключения.
	},

	correctFiedlClass:         "correctFied",                 //Класс присваевается правильнозаполненному полю. Без селектора.
	wrongFieldClass:           "wrongField",                  //Класс присваевается неправильнозаполненному полю. Без селектора.
	successMessageClass:       "successMessage",              //Класс уведомления об успехе, присваевается абзацу уведомлений. Без селектора.
	errorMessageClass:         "errorMessage",                //Класс уведомления об ошибке, присваевается абзацу уведомлений. Без селектора.

	Strings: {
		successMessage:        "Success!",                    //Текст успешного уведомления об отправке письма.
		validError:            "Valid Error!",                //Текст ошибки при неправильном заполнении формы.
	},

	TAG: "*** FeedBackFormAJAX: ",
}

///////////////////////////////////////////////////////////////////////////////////////////////////////

var FeedBackFormAJAX = {
	isFormCorrect: true,
	form: null,
	submitLink: null,
	notification: null,
	nessFields: [],

	initiate: function() {
		FeedBackFormAJAX.form = $(Config.DOM.feedBackFormAJAX);
		FeedBackFormAJAX.submitLink = $(Config.DOM.feedBackFormAJAX + " " +  Config.DOM.submitLink);
		FeedBackFormAJAX.notification = $(Config.DOM.feedBackFormAJAX + " " +  Config.DOM.notification);
		FeedBackFormAJAX.nessFields = $(Config.DOM.feedBackFormAJAX + " " +  Config.DOM.nessFields);

		FeedBackFormAJAX.nessFields.bind("keyup", function(event) {
			FeedBackFormAJAX.isInputCorrect(event.target);
		});

		FeedBackFormAJAX.nessFields.bind("blur", function(event) {
			FeedBackFormAJAX.isInputCorrect(event.target);
		});

		FeedBackFormAJAX.submitLink.bind("click", function(event) {
			FeedBackFormAJAX.isFormCorrect = true;
			$.each(FeedBackFormAJAX.nessFields, function(index, element) {
				if (!FeedBackFormAJAX.isInputCorrect(element))
					FeedBackFormAJAX.isFormCorrect = false;
			});

			if (FeedBackFormAJAX.isFormCorrect)
				FeedBackFormAJAX.sendRequest(FeedBackFormAJAX.form.serialize(),
				FeedBackFormAJAX.successHandler, FeedBackFormAJAX.errorResponseHandler);
			else
				FeedBackFormAJAX.setErrorNotification(Config.Strings.validError);
		});
	},

	isInputCorrect: function(target) {
		var isFieldCorrect = false;
		switch(target.name) {
			case Config.DOM.emailField:
				if (FeedBackFormAJAX.isEmailCorrect(target.value))
					isFieldCorrect = true;
				else
					isFieldCorrect = false;
			break;

			case Config.DOM.phoneField:
				if (FeedBackFormAJAX.isPhoneCorrect(target.value))
					isFieldCorrect = true;
				else
					isFieldCorrect = false;
			break;

			default:
				if (!FeedBackFormAJAX.isFieldEmpty(target.value))
					isFieldCorrect = true;
				else
					isFieldCorrect = false;
			break;
		}

		if(isFieldCorrect)
			FeedBackFormAJAX.setFieldRight($(target));
		else
			FeedBackFormAJAX.setFieldWrong($(target));

		return isFieldCorrect;
	},

	isFieldEmpty: function(value) {
		return value.length == 0;
	},

	isEmailCorrect: function(value) {
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    	return regex.test(value);
	},

	isPhoneCorrect: function(value) {
		var regex = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
    	return regex.test(value);
	},

	setFieldRight: function(field) {
		if (field.hasClass(Config.wrongFieldClass))
			field.removeClass(Config.wrongFieldClass);
		field.addClass(Config.correctFiedlClass);
	},

	setFieldWrong: function(field) {
		if (field.hasClass(Config.correctFiedlClass))
			field.removeClass(Config.correctFiedlClass);
		field.addClass(Config.wrongFieldClass);
	},

	setErrorNotification: function(notification) {
		if (FeedBackFormAJAX.notification.hasClass(Config.successMessageClass))
			FeedBackFormAJAX.notification.removeClass(Config.successMessageClass);
		FeedBackFormAJAX.notification.addClass(Config.errorMessageClass);
		FeedBackFormAJAX.notification.html(notification);
	},

	setSuccessNotification: function(notification) {
		if (FeedBackFormAJAX.notification.hasClass(Config.errorMessageClass))
			FeedBackFormAJAX.notification.removeClass(Config.errorMessageClass);
		FeedBackFormAJAX.notification.addClass(Config.successMessageClass);
		FeedBackFormAJAX.notification.html(notification);
	},

	sendRequest: function(data, successHandler, errorHandler) {
		console.log(Config.TAG + "Sending data: " + data);
		$.ajax({
			url: Config.AJAX.ajaxUrl,
			type: Config.AJAX.method,
			success: function (response) {
				successHandler(response);
			},

			error: function(error) {
				errorHandler(error);
			}
		});
	},

	successResponseHandler: function(message) {
		console.log(Config.TAG + message);
		FeedBackFormAJAX.setSuccessNotification(message);

		if (message == null)
			FeedBackFormAJAX.setSuccessNotification(Config.Strings.successMessage);
	},

	errorResponseHandler: function(error) {
		console.log(Config.TAG + "Sending error: " + error);
		FeedBackFormAJAX.setErrorNotification(error);
	},
}
