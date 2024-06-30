import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function List({ auth, products }) {
    return (
        <AuthenticatedLayout
            user={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Products</h2>}
        >
            <Head title="Products" />

            {products.map((product) => (
            <div key={product.id} className="my-2 py-2 px-2 max-w-sm mx-auto bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
                <img className="block mx-auto h-24 rounded-[12px] sm:mx-0 sm:shrink-0" src={product.images} alt="Plan" />
                <div className="text-center space-y-2 sm:text-left">
                    <div className="space-y-0.5">
                        <p className="text-lg text-black font-semibold">
                            {product.name}
                        </p>
                        <p className="text-slate-500 font-medium">
                            {product.description}
                        </p>
                    </div>
                    <button className="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Subscripton</button>
                    <button className="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Deactive</button>
                </div>
            </div>
            ))}
            
        </AuthenticatedLayout>
    );
}