<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 *
 * This file is part of working application based on kohana framework
 * and using modules: box, calendar, comments, components, entity, photos, tools.
 */

/**
 * Class Controller_Dyscypliny
 */
class Controller_Dyscypliny extends Controller_Abstract_Front
{
    /**
     * @var Model_Category|null
     */
    protected $_entity = null;

    public function before()
    {
        parent::before();

        $this->_entity = $this->friends()->entityRequester()->get('Category', $this->_cache, $this->_cacheLifetime);
        $this->_throw404IfEmpty($this->_entity);
    }

    public function action_index()
    {
        Helper_Meta::addTitle($this->_entity->name);
        Helper_Locator::add(ucfirst($this->_entity->name), $this->_entity->getURL());

        $pastEvents = Model_Event::getEvents(null, $this->_entity)->onlyPast()->onlyActive();
        $incomingEvents = Model_Event::getEvents(null, $this->_entity)->orderByStatus()->onlyIncoming()->onlyActive();
        $places = $this->_entity->places->orderWithPhotosFirst()->onlyActive();
        $users = $this->_entity->getLatestUsers();

        $pastEvents->limit(5);
        $incomingEvents->limit(5);
        $places->order_by('status', 'DESC')->orderByRandom()->limit(30);
        $users->limit(4);

        $calendarLink = new Component_Event_LinkToCalendar($this->_entity);

        $boxLocator = new Box_Bar(Helper_Locator::render().$calendarLink->render());
        $boxMainPhoto = new Box_Small(new Component_Photo_TileBig($this->_entity->main_photo, null, null, null, null, false), 'Zdjęcie główne');
        $boxInfo = new Box_Medium(new Component_Category_Info($this->_entity), 'Ogólne informacje');
        $boxUsers = new Box_Medium(new Component_Category_Users($this->_entity, $users), 'Grają w '.Helper_Inflector::genitive($this->_entity->name));
        $boxPastEvents = new Box_Small(new Component_Event_SmallList($pastEvents), 'Turnieje rozegrane');
        $boxIncomingEvents = new Box_Big(new Component_Event_List($incomingEvents, false), 'Turnieje planowane');
        $boxPlaces = new Box_Big(new Component_Place_ListWithCities($places), 'Kluby i inne obiekty sportowe');
        $boxComments = new Box_Big(new Component_Comments($this->_entity), 'Komentarze');

        $boxInfo->cache($this->_entity->getURL().'//info');
        $boxPastEvents->cache($this->_entity->getURL().'//past-events');
        $boxIncomingEvents->cache($this->_entity->getURL().'//incoming-events');
        $boxPlaces->cache($this->_entity->getURL().'//places');

        if (!Auth::instance()->logged_in())
        {
            $boxUsers->cache($this->_entity->getURL().'//users');
            $boxComments->cache($this->_entity->getURL().'//comments', 600);
        }

        $this->top->add($boxLocator);
        $this->content->add(new Box_EqualRow(array($boxMainPhoto, $boxInfo)));
        $this->content->add(new Box_EqualRow(array($boxPastEvents, $boxUsers)));
        $this->content->add($boxIncomingEvents);
        $this->content->add($boxPlaces);

        if (Auth::instance()->logged_in('admin'))
        {
            $boxPhotos = new Box_Big(new Component_Photos($this->_entity, true), 'Zdjęcia');
            $this->content->add($boxPhotos);
        }

        $this->content->add($boxComments);
    }

    public function action_kalendarz()
    {
        $calendar = $this->friends()->calendar(Model_Event::getEvents(null, $this->_entity)->onlyActive());

        $boxEvents = $calendar->getEventsBox();
        $boxEvents->cache($this->_entity->getURL().'/kalendarz/'.$calendar->getUrlName());

        $this->content->add($boxEvents);
    }

    public function action_zapisz_sie()
    {
        $this->friends()->subscriber()->subscribe($this->_me);
    }

    public function action_wypisz_sie()
    {
        $this->friends()->subscriber()->unsubscribe($this->_me);
    }

    public function action_dodaj_komentarz()
    {
        $this->friends()->commenter()->postComment();
    }

    public function action_dodaj_zdjecie()
    {
        if (Auth::instance()->logged_in('admin'))
        {
            $this->friends()->gallerier()->addPhoto();
        }
    }
}
