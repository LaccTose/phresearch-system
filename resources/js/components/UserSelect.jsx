import { Combobox } from '@headlessui/react'
import { Fragment, useState } from 'react'

export default function UserSelect({ currentUser, users }) {
  const [selectedUser, setSelectedUser] = useState(currentUser || null)
  const [query, setQuery] = useState('')

  const filteredUsers =
    query === ''
      ? users
      : users.filter((user) =>
          user.name.toLowerCase().includes(query.toLowerCase())
        )

  return (
    <div className="w-72">
      <label className="block text-sm font-medium text-gray-700">Assigned to</label>
      <p className="text-xs text-gray-500 mb-1">
        This user will have full access to the project.
      </p>
      <Combobox value={selectedUser} onChange={setSelectedUser} name="user">
        <div className="relative mt-1">
          <Combobox.Input
            className="w-full border border-gray-300 rounded-md shadow-sm py-2 pl-3 pr-10 text-sm leading-5 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
            displayValue={(user) => user?.name || ''}
            onChange={(event) => setQuery(event.target.value)}
            placeholder="Select user…"
          />
          <Combobox.Button className="absolute inset-y-0 right-0 flex items-center pr-2">
            <svg
              className="h-5 w-5 text-gray-400"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              aria-hidden="true"
            >
              <path
                fillRule="evenodd"
                d="M10 3a1 1 0 01.707.293l5 5a1 1 0 01-1.414 1.414L10 5.414 5.707 9.707a1 1 0 01-1.414-1.414l5-5A1 1 0 0110 3z"
                clipRule="evenodd"
              />
            </svg>
          </Combobox.Button>

          {filteredUsers.length > 0 && (
            <Combobox.Options className="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
              {filteredUsers.map((user) => (
                <Combobox.Option key={user.id} value={user} as={Fragment}>
                  {({ active, selected }) => (
                    <li
                      className={`cursor-pointer select-none relative py-2 pl-3 pr-9 ${
                        active ? 'bg-indigo-600 text-white' : 'text-gray-900'
                      }`}
                    >
                      {user.name}
                      {selected && (
                        <span className="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                          ✓
                        </span>
                      )}
                    </li>
                  )}
                </Combobox.Option>
              ))}
            </Combobox.Options>
          )}
        </div>
      </Combobox>
    </div>
  )
}
