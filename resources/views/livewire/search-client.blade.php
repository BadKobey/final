<div>
    <input wire:model="search" type="search" placeholder="Поиск товара..">

    <table class="table table-striped projects">
        <thead>
        <tr>
            <th style="width: 5%">
                ID
            </th>
            <th>
                Артикул
            </th>
            <th>
                Номенклатура
            </th>
            <th>
                Цена
            </th>
            <th>
                Количество
            </th>
            <th>
                Склад
            </th>
            <th>
                Дата добавления
            </th>
            <th style="width: 30%">
            </th>
        </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    {{ $product['id'] }}
                </td>
                <td>
                    {{ $product['article'] }}
                </td>
                <td>
                    {{ $product['nomenclature'] }}
                </td>
                <td>
                    {{ $product['price'] }}
                </td>
                <td>
                    {{ $product['count'] }}
                </td>
                <td>
                    {{ $product->stock['title'] }}
                </td>

                <td>
                    {{ $product['created_at'] }}
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product['id']) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Редактировать
                    </a>
                    <form action="{{ route('product.destroy', $product['id']) }}" method="POST"
                          style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                            <i class="fas fa-trash">
                            </i>
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>
