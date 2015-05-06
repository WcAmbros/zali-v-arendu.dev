
var hall={
    template:{
        modal:(
            <div className="add-hall">
                <div className="add-hall-background"></div>

            </div>
        ),
        form:(
            <form className="add-hall-form">
            </form>
        ),
        location:(
            <div class="add-hall-form-location">
                <div class="add-hall-form-location__header">Местоположение зала</div>
                <div class="add-hall-form-col">
                    <label class="add-hall-form__line"><span class="add-hall-form-location__label">Город:</span>
                        <select class="add-hall-form-location__select">
                            <option>Санкт-Петербург</option>
                        </select>
                    </label>
                    <label class="add-hall-form__line"><span class="add-hall-form-location__label">Метро:</span>
                        <select class="add-hall-form-location__select">
                            <option>Не выбран</option>
                            <option>Лиговский пр.</option>
                        </select>
                    </label>
                    <label class="add-hall-form__line"><span class="add-hall-form-location__label">Район:</span>
                        <select class="add-hall-form-location__select">
                            <option>Не выбран</option>
                            <option>Центральный</option>
                        </select>
                    </label>
                    <label class="add-hall-form__line"><span class="add-hall-form-location__label">Улица:</span>
                        <select class="add-hall-form-location__select">
                            <option>Не выбран</option>
                            <option>Лиговский пр.</option>
                        </select>
                    </label>
                    <label class="add-hall-form__line">
                        <span class="add-hall-form-location__label">Город:</span> <input class="add-hall-form-location__input"/> <span class="add-hall-form-location__label">Корпус:</span> <input class="add-hall-form-location__input"/>
                    </label>
                    <div class="add-hall-form-col add-hall-form-col_right">
                        <label class="add-hall-form__line">
                            <span class="add-hall-form-location__label">Примечание как добраться:</span>
                            <textarea class="add-hall-form-location__textarea"></textarea>
                        </label>
                    </div>
                </div>
            </div>
        )
    }
};