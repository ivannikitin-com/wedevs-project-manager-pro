<?php
/**
 * Расширение Канбан
 *
 * @package CPM/Extensions
 * @version 2.0.0
 */
namespace CPM\Extensions;

class Kanban extends ExtensionBase implements IExtension  
{
	/**
	 * Custom Post Type
	 */
	const CPT = 'kbc_canboard';
	
	/**
	 * Название группы кэшей
	 */
	const CACHE_GROUP = 'cpm_kanban';
	
	/**
	 * Объект меток задач
	 */
	private $taskLabel;
	
    /**
	 * Конструктор класса
	 */
	public function __construct()
	{
		// Создаем экземпляр меток задач
		require_once( dirname( __FILE__ ) . '/kanban/TaskLabel.php' );
		$this->taskLabel = new Kanban\TaskLabel( $this );
	}	
	
	
	/**
	 * Метод возвращает название расширения
	 * @return string
	 */
    public function getTitle()
	{
		return __( 'Канбан', 'cpm' );
	}
	
    /**
	 * Метод инициализирует расширение. В нем происходит установка всех хуков
	 */
	public function init()
	{
		// Инициализируем метки задач
		$this->taskLabel->init();
	}
}