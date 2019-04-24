<div class="popups">
  <div class="popup" id="form">
    <div class="popup__container">
      <div class="popup__closer"></div>
      <div class="popup__container-inner">
        <form class="popup__form js-validate">
          <div class="popup__title h1">Заполните форму</div>
          <div class="popup__fields">
            <div class="popup__field">
              <label class="popup__field-label">Имя</label>
              <input class="popup__field-input" type="text" name="name">
            </div>
            <div class="popup__field">
              <label class="popup__field-label">Телефон</label>
              <input class="popup__field-input phone" type="text" name="phone">
            </div>
            <div class="popup__field">
              <label class="popup__field-label">Почта</label>
              <input class="popup__field-input" type="text" name="mail">
            </div>
            <div class="popup__field popup__field--half">
              <label class="popup__field-label">Комментарий</label>
              <input class="popup__field-input" type="text" name="message">
            </div>
            <div class="popup__field popup__field--half">
              <div class="popup__fields-policy">
                Отправляя нам данную форму, вы соглашаетесь<br> с <a class="link link--text" href="#">политикой
                  конфиденциальности.</a></div>
            </div>
            <div class="popup__form-submit">
              <button class="button button--blue" type="submit">Отправить</button>
            </div>
          </div>
        </form>
        <div class="popup__success">
          <div class="popup__title h1">Готово!</div>
          <div class="popup__success-text">Ваша заявка успешно отправлена, в ближайшее время наш сотрудник свяжется с
            вами.
          </div>
          <div class="popup__success-timer">Это окно закроется<br>  через <span
                class='popup__success-timer-value'>2</span> <span class='popup__success-timer-sec'>секунд</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="popup" id="callback">
    <div class="popup__container">
      <div class="popup__closer"></div>
      <div class="popup__container-inner">
        <form class="popup__form js-validate">
          <div class="popup__title h1">Заказать обратный<br>звонок</div>
          <div class="popup__fields popup__fields--small">
            <div class="popup__field">
              <label class="popup__field-label">Имя</label>
              <input class="popup__field-input" type="text" name="name">
            </div>
            <div class="popup__field">
              <label class="popup__field-label">Телефон</label>
              <input class="popup__field-input phone" type="text" name="phone">
            </div>
            <div class="time">
              <div class="time__title">Удобное время</div>
              <div class="time__row">
                <div class="time__item">
                  <div class="radio">
                    <input class="radio__input" type="radio" name="time-to-call" id="radio_1">
                    <label class="radio__label" for="radio_1">В течение 5 минут</label>
                  </div>
                </div>
                <div class="time__item">
                  <div class="radio">
                    <input class="radio__input" type="radio" name="time-to-call" id="radio_2">
                    <label class="radio__label" for="radio_2">С 9:00 до 12:00</label>
                  </div>
                </div>
                <div class="time__item">
                  <div class="radio">
                    <input class="radio__input" type="radio" name="time-to-call" id="radio_3">
                    <label class="radio__label" for="radio_3">С 13:00 до 19:00</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="popup__form-submit popup__form-submit--cnt">
            <button class="button button--blue" type="submit">Отправить</button>
          </div>
        </form>
        <div class="popup__success">
          <div class="popup__title h1">Готово!</div>
          <div class="popup__success-text">Ваша заявка успешно отправлена, в ближайшее время наш сотрудник свяжется с
            вами.
          </div>
          <div class="popup__success-timer">Это окно закроется<br>  через <span
                class='popup__success-timer-value'>2</span> <span class='popup__success-timer-sec'>секунд</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>